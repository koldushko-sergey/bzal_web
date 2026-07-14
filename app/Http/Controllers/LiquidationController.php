<?php

namespace App\Http\Controllers;

use App\Models\LiquidationItem;
use App\Models\Page;

class LiquidationController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'liquidation')->where('is_published', true)->firstOrFail();
        $items = LiquidationItem::published()->get();

        return view('liquidation.index', compact('page', 'items'));
    }
}
