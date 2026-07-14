<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Traits\UploadsFiles;
use Illuminate\Http\Request;

class PageController extends Controller
{
    use UploadsFiles;

    public function index()
    {
        $pages = Page::orderBy('title')->get();

        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.form', ['page' => new Page]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['slug'] = $this->makeSlug($data['title'], Page::class);
        $data['image'] = $this->storeImage($request->file('image'), 'pages');
        $data['is_published'] = $request->boolean('is_published');

        Page::create($data);

        return redirect()->route('admin.pages.index')->with('success', 'Страница создана.');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.form', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $data = $this->validated($request);
        $data['image'] = $this->storeImage($request->file('image'), 'pages', $page->image);
        $data['is_published'] = $request->boolean('is_published');

        $page->update($data);

        return redirect()->route('admin.pages.index')->with('success', 'Страница обновлена.');
    }

    public function destroy(Page $page)
    {
        $this->deleteFile($page->image);
        $page->delete();

        return redirect()->route('admin.pages.index')->with('success', 'Страница удалена.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'image' => 'nullable|image|max:5120',
        ]);
    }
}
