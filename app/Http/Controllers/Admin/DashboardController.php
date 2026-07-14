<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LiquidationItem;
use App\Models\News;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Submission;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'stats' => [
                'pages' => Page::count(),
                'news' => News::count(),
                'categories' => ProductCategory::count(),
                'products' => Product::count(),
                'liquidation' => LiquidationItem::count(),
                'submissions' => Submission::unread()->count(),
            ],
        ]);
    }
}
