<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\ProductCategory;
use App\Models\SiteSetting;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'latestNews' => News::published()->latest('published_at')->take(4)->get(),
            'categories' => ProductCategory::published()->take(6)->get(),
            'heroTitle' => SiteSetting::get('hero_title'),
            'heroSubtitle' => SiteSetting::get('hero_subtitle'),
            'aboutTeaser' => SiteSetting::get('about_teaser'),
            'stats' => [
                ['value' => SiteSetting::get('stat_years', '50+'), 'label' => 'лет на рынке'],
                ['value' => SiteSetting::get('stat_area', '111,5'), 'label' => 'тыс. м² площадей'],
                ['value' => SiteSetting::get('stat_equipment', '1044'), 'label' => 'ед. оборудования'],
                ['value' => SiteSetting::get('stat_metal_cutting', '901'), 'label' => 'ед. металлорежущего'],
            ],
        ]);
    }
}
