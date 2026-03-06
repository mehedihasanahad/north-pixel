<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $locale = app()->getLocale();

        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $query = Product::with(['category', 'techStack', 'tags'])
            ->where('is_active', true);

        // Category filter
        if ($request->filled('category')) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $request->category));
        }

        // Search
        if ($request->filled('search')) {
            $term = $request->search;
            $query->where(function ($q) use ($term) {
                $q->where('title_en', 'like', "%{$term}%")
                  ->orWhere('title_bn', 'like', "%{$term}%")
                  ->orWhere('short_desc_en', 'like', "%{$term}%")
                  ->orWhere('short_desc_bn', 'like', "%{$term}%");
            });
        }

        // Price range
        if ($request->filled('min_price')) {
            $query->where('price_bdt', '>=', (int) $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price_bdt', '<=', (int) $request->max_price);
        }

        // Sort
        match ($request->get('sort', 'default')) {
            'price_asc'  => $query->orderBy('price_bdt'),
            'price_desc' => $query->orderByDesc('price_bdt'),
            'newest'     => $query->orderByDesc('created_at'),
            default      => $query->orderBy('sort_order')->orderByDesc('is_featured'),
        };

        $products = $query->paginate(12)->withQueryString();

        return view('pages.products', compact('products', 'categories'));
    }

    public function show(string $slug): View
    {
        $product = Product::with(['category', 'techStack', 'features', 'screenshots', 'tags'])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $related = Product::with(['category', 'techStack'])
            ->where('is_active', true)
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(3)
            ->get();

        return view('pages.product-detail', compact('product', 'related'));
    }
}
