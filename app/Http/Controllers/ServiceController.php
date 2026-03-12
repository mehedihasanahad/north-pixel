<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function webDev(): View
    {
        return view('pages.services.website-development');
    }

    public function mobileApp(): View
    {
        return view('pages.services.mobile-app-development');
    }

    public function speedOpt(): View
    {
        return view('pages.services.website-speed-optimization');
    }

    public function maintenance(): View
    {
        return view('pages.services.website-maintenance');
    }

    public function readyMade(): View
    {
        $products = Product::with(['category', 'techStack', 'screenshots'])
            ->where('is_active', true)
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->get();

        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('pages.services.ready-made-websites', compact('products', 'categories'));
    }
}
