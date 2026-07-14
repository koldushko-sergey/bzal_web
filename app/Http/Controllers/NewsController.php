<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::published()->latest('published_at')->paginate(9);

        return view('news.index', compact('news'));
    }

    public function show(string $slug)
    {
        $article = News::where('slug', $slug)->published()->firstOrFail();

        return view('news.show', compact('article'));
    }
}
