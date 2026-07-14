<?php

namespace App\Providers;

use App\Models\ProductCategory;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer(['components.header', 'components.footer'], function ($view) {
            $view->with([
                'navCategories' => ProductCategory::published()->get(),
                'sitePhone' => SiteSetting::get('phone', '+375 44 751 44 77'),
                'siteSlogan1' => SiteSetting::get('slogan_line1', 'Более 50 лет'),
                'siteSlogan2' => SiteSetting::get('slogan_line2', 'на рынке станкостроения'),
                'siteFooterText' => SiteSetting::get('footer_text'),
                'siteAddress' => SiteSetting::get('address'),
                'siteEmail' => SiteSetting::get('email'),
            ]);
        });
    }
}
