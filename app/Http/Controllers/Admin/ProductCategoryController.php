<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Traits\UploadsFiles;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    use UploadsFiles;

    public function index()
    {
        $categories = ProductCategory::orderBy('sort_order')->get();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.form', ['category' => new ProductCategory]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['slug'] = $this->makeSlug($data['name'], ProductCategory::class);
        $data['image'] = $this->storeImage($request->file('image'), 'categories');
        $data['is_published'] = $request->boolean('is_published');

        ProductCategory::create($data);

        return redirect()->route('admin.categories.index')->with('success', 'Категория создана.');
    }

    public function edit(ProductCategory $category)
    {
        return view('admin.categories.form', compact('category'));
    }

    public function update(Request $request, ProductCategory $category)
    {
        $data = $this->validated($request);
        $data['image'] = $this->storeImage($request->file('image'), 'categories', $category->image);
        $data['is_published'] = $request->boolean('is_published');

        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Категория обновлена.');
    }

    public function destroy(ProductCategory $category)
    {
        $this->deleteFile($category->image);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Категория удалена.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'image' => 'nullable|image|max:5120',
        ]);
    }
}
