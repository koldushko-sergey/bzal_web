<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::published()->with('publishedProducts')->get();

        return view('products.index', compact('categories'));
    }

    public function category(string $slug)
    {
        $category = ProductCategory::where('slug', $slug)
            ->where('is_published', true)
            ->with('publishedProducts')
            ->firstOrFail();

        return view('products.category', compact('category'));
    }

    public function show(string $categorySlug, string $slug)
    {
        $category = ProductCategory::where('slug', $categorySlug)
            ->where('is_published', true)
            ->firstOrFail();

        $product = Product::where('product_category_id', $category->id)
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('products.show', compact('category', 'product'));
    }
}
