<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Page;

class InformationController extends Controller
{
    public function corruption()
    {
        return $this->renderPage('corruption', 'information.corruption');
    }

    public function extremism()
    {
        return $this->renderPage('extremism', 'information.extremism');
    }

    public function mchs()
    {
        return $this->renderPage('mchs', 'information.mchs');
    }

    public function documents()
    {
        $page = Page::where('slug', 'documents')->where('is_published', true)->firstOrFail();
        $documents = Document::published()->where('category', 'documents')->get();

        return view('information.documents', compact('page', 'documents'));
    }

    private function renderPage(string $slug, string $view)
    {
        $page = Page::where('slug', $slug)->where('is_published', true)->firstOrFail();

        return view($view, compact('page'));
    }
}
