<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Traits\UploadsFiles;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use UploadsFiles;

    public function index()
    {
        $news = News::latest('published_at')->paginate(15);

        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.form', ['article' => new News]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['slug'] = $this->makeSlug($data['title'], News::class);
        $data['image'] = $this->storeImage($request->file('image'), 'news');
        $data['is_published'] = $request->boolean('is_published');

        News::create($data);

        return redirect()->route('admin.news.index')->with('success', 'Новость создана.');
    }

    public function edit(News $news)
    {
        return view('admin.news.form', ['article' => $news]);
    }

    public function update(Request $request, News $news)
    {
        $data = $this->validated($request);
        $data['image'] = $this->storeImage($request->file('image'), 'news', $news->image);
        $data['is_published'] = $request->boolean('is_published');

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'Новость обновлена.');
    }

    public function destroy(News $news)
    {
        $this->deleteFile($news->image);
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Новость удалена.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'nullable|string',
            'published_at' => 'nullable|date',
            'image' => 'nullable|image|max:5120',
        ]);
    }
}
