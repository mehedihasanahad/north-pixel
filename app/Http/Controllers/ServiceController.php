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

    public function domain(): View
    {
        return view('pages.services.domain-hosting');
    }

    public function cloud(): View
    {
        return view('pages.services.cloud-management');
    }

    public function devops(): View
    {
        return view('pages.services.devops-server-management');
    }

    public function security(): View
    {
        return view('pages.services.cyber-security');
    }

    public function graphics(): View
    {
        return view('pages.services.graphics-design');
    }

    public function marketing(): View
    {
        return view('pages.services.digital-marketing');
    }

    public function aiAutomation(): View
    {
        return view('pages.services.ai-automation');
    }

    public function maintenance(): View
    {
        return view('pages.services.website-maintenance');
    }

    public function serverMaintenance(): View
    {
        return view('pages.services.server-maintenance');
    }

    public function speedOpt(): View
    {
        return view('pages.services.website-speed-optimization');
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
