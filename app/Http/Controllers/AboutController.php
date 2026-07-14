<?php

namespace App\Http\Controllers;

use App\Models\Page;

class AboutController extends Controller
{
    public function company()
    {
        return $this->renderPage('company', 'about.company');
    }

    public function history()
    {
        return $this->renderPage('history', 'about.history');
    }

    public function team()
    {
        return $this->renderPage('team', 'about.team');
    }

    public function corporate()
    {
        return $this->renderPage('corporate', 'about.corporate');
    }

    private function renderPage(string $slug, string $view)
    {
        $page = Page::where('slug', $slug)->where('is_published', true)->firstOrFail();

        return view($view, compact('page'));
    }
}
