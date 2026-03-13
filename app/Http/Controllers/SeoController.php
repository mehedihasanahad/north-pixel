<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Response;

class SeoController extends Controller
{
    public function sitemap(): Response
    {
        $siteUrl = rtrim(config('app.url'), '/');

        $staticUrls = [
            ['loc' => $siteUrl . '/',                                    'priority' => '1.0',  'changefreq' => 'weekly'],
            ['loc' => $siteUrl . '/products',                            'priority' => '0.9',  'changefreq' => 'daily'],
            ['loc' => $siteUrl . '/services/website-development',        'priority' => '0.85', 'changefreq' => 'monthly'],
            ['loc' => $siteUrl . '/services/mobile-app-development',     'priority' => '0.85', 'changefreq' => 'monthly'],
            ['loc' => $siteUrl . '/services/website-speed-optimization', 'priority' => '0.8',  'changefreq' => 'monthly'],
            ['loc' => $siteUrl . '/services/website-maintenance',        'priority' => '0.8',  'changefreq' => 'monthly'],
            ['loc' => $siteUrl . '/services/ready-made-websites',        'priority' => '0.8',  'changefreq' => 'monthly'],
            ['loc' => $siteUrl . '/custom-request',                      'priority' => '0.75', 'changefreq' => 'monthly'],
            ['loc' => $siteUrl . '/about',                               'priority' => '0.7',  'changefreq' => 'monthly'],
            ['loc' => $siteUrl . '/contact',                             'priority' => '0.7',  'changefreq' => 'monthly'],
            ['loc' => $siteUrl . '/privacy',                             'priority' => '0.3',  'changefreq' => 'yearly'],
            ['loc' => $siteUrl . '/terms',                               'priority' => '0.3',  'changefreq' => 'yearly'],
        ];

        $products = Product::where('is_active', true)
            ->select('slug', 'updated_at')
            ->latest()
            ->get()
            ->map(fn ($p) => [
                'loc'        => $siteUrl . '/products/' . $p->slug,
                'lastmod'    => $p->updated_at->toAtomString(),
                'priority'   => '0.8',
                'changefreq' => 'weekly',
            ]);

        $xml = view('seo.sitemap', [
            'staticUrls' => $staticUrls,
            'products'   => $products,
        ])->render();

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }

    public function robots(): Response
    {
        $siteUrl = rtrim(config('app.url'), '/');

        $content = "User-agent: *\n"
            . "Disallow: /admin\n"
            . "Disallow: /dashboard\n"
            . "Disallow: /login\n"
            . "Disallow: /register\n"
            . "Disallow: /forgot-password\n"
            . "Disallow: /reset-password\n"
            . "Disallow: /custom-request/success\n"
            . "Disallow: /profile\n"
            . "\n"
            . "Allow: /\n"
            . "\n"
            . "Sitemap: {$siteUrl}/sitemap.xml\n";

        return response($content, 200)->header('Content-Type', 'text/plain');
    }
}
