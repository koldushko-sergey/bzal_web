<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Traits\UploadsFiles;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use UploadsFiles;

    public function index()
    {
        $products = Product::with('category')->orderBy('sort_order')->paginate(15);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.form', [
            'product' => new Product,
            'categories' => ProductCategory::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['slug'] = $this->makeSlug($data['name'], Product::class);
        $data['image'] = $this->storeImage($request->file('image'), 'products');
        $data['is_published'] = $request->boolean('is_published');

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Продукция создана.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.form', [
            'product' => $product,
            'categories' => ProductCategory::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $data = $this->validated($request);
        $data['image'] = $this->storeImage($request->file('image'), 'products', $product->image);
        $data['is_published'] = $request->boolean('is_published');

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Продукция обновлена.');
    }

    public function destroy(Product $product)
    {
        $this->deleteFile($product->image);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Продукция удалена.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'product_category_id' => 'required|exists:product_categories,id',
            'name' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'image' => 'nullable|image|max:5120',
        ]);
    }
}
