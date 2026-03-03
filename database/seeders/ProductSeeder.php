<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categoryId = fn(string $slug) => DB::table('categories')->where('slug', $slug)->value('id');

        $products = [
            [
                'category_slug'   => 'ecommerce',
                'slug'            => 'shopwave-ecommerce',
                'title_en'        => 'ShopWave — Full-Featured E-Commerce',
                'title_bn'        => 'শপওয়েভ — সম্পূর্ণ ই-কমার্স সমাধান',
                'short_desc_en'   => 'A modern, mobile-first e-commerce platform with cart, checkout, and admin panel.',
                'short_desc_bn'   => 'কার্ট, চেকআউট ও অ্যাডমিন প্যানেলসহ আধুনিক মোবাইল-ফার্স্ট ই-কমার্স প্ল্যাটফর্ম।',
                'description_en'  => "ShopWave is a production-ready e-commerce solution built with Laravel and Next.js. It includes product management, cart, coupon system, order tracking, and a full-featured admin dashboard. Stripe and SSLCommerz payment gateways are pre-integrated.",
                'description_bn'  => "শপওয়েভ হলো Laravel ও Next.js দিয়ে তৈরি একটি প্রোডাকশন-রেডি ই-কমার্স সমাধান। এতে পণ্য ব্যবস্থাপনা, কার্ট, কুপন সিস্টেম, অর্ডার ট্র্যাকিং এবং পূর্ণাঙ্গ অ্যাডমিন ড্যাশবোর্ড রয়েছে।",
                'price_bdt'       => 14999.00,
                'price_usd'       => 135.00,
                'preview_url'     => 'https://shopwave.demo.example.com',
                'thumbnail_url'   => '/images/products/shopwave-thumb.jpg',
                'is_featured'     => true,
                'is_active'       => true,
                'is_new'          => true,
                'sort_order'      => 1,
                'features_en'     => ['Product & variant management', 'Cart & wishlist', 'Coupon / discount engine', 'Order tracking dashboard', 'Stripe & SSLCommerz payment', 'Admin panel with analytics'],
                'features_bn'     => ['পণ্য ও ভেরিয়েন্ট ম্যানেজমেন্ট', 'কার্ট ও উইশলিস্ট', 'কুপন / ডিসকাউন্ট ইঞ্জিন', 'অর্ডার ট্র্যাকিং ড্যাশবোর্ড', 'Stripe ও SSLCommerz পেমেন্ট', 'অ্যানালিটিক্সসহ অ্যাডমিন প্যানেল'],
                'tech_stack'      => ['Laravel 11', 'Next.js 14', 'MySQL', 'Tailwind CSS', 'Stripe', 'Redis'],
                'tags'            => ['ecommerce', 'shop', 'cart', 'laravel', 'nextjs'],
                'screenshots'     => [
                    ['url' => '/images/products/shopwave-1.jpg', 'alt_en' => 'Homepage', 'alt_bn' => 'হোমপেজ', 'sort_order' => 1],
                    ['url' => '/images/products/shopwave-2.jpg', 'alt_en' => 'Product Page', 'alt_bn' => 'পণ্য পেজ', 'sort_order' => 2],
                    ['url' => '/images/products/shopwave-3.jpg', 'alt_en' => 'Admin Dashboard', 'alt_bn' => 'অ্যাডমিন ড্যাশবোর্ড', 'sort_order' => 3],
                ],
            ],
            [
                'category_slug'   => 'saas',
                'slug'            => 'taskflow-saas',
                'title_en'        => 'TaskFlow — Team Project Management SaaS',
                'title_bn'        => 'টাস্কফ্লো — টিম প্রজেক্ট ম্যানেজমেন্ট স্যাস',
                'short_desc_en'   => 'Kanban-based project management tool with multi-team support and real-time updates.',
                'short_desc_bn'   => 'মাল্টি-টিম সাপোর্ট ও রিয়েল-টাইম আপডেটসহ কানবান-ভিত্তিক প্রজেক্ট ম্যানেজমেন্ট টুল।',
                'description_en'  => "TaskFlow is a SaaS project management application inspired by Trello and Linear. It supports multiple workspaces, kanban boards, task assignments, deadlines, file attachments, and real-time collaboration via WebSockets.",
                'description_bn'  => "টাস্কফ্লো হলো Trello ও Linear অনুপ্রাণিত একটি স্যাস প্রজেক্ট ম্যানেজমেন্ট অ্যাপ্লিকেশন। এটি একাধিক ওয়ার্কস্পেস, কানবান বোর্ড, টাস্ক অ্যাসাইনমেন্ট, ডেডলাইন এবং WebSocket রিয়েল-টাইম কোলাবরেশন সাপোর্ট করে।",
                'price_bdt'       => 19999.00,
                'price_usd'       => 180.00,
                'preview_url'     => 'https://taskflow.demo.example.com',
                'thumbnail_url'   => '/images/products/taskflow-thumb.jpg',
                'is_featured'     => true,
                'is_active'       => true,
                'is_new'          => true,
                'sort_order'      => 2,
                'features_en'     => ['Multi-workspace & team support', 'Kanban & list view', 'Task assignments & deadlines', 'File & image attachments', 'Real-time collaboration (WebSocket)', 'Role-based access control'],
                'features_bn'     => ['মাল্টি-ওয়ার্কস্পেস ও টিম সাপোর্ট', 'কানবান ও লিস্ট ভিউ', 'টাস্ক অ্যাসাইনমেন্ট ও ডেডলাইন', 'ফাইল ও ইমেজ অ্যাটাচমেন্ট', 'রিয়েল-টাইম কোলাবরেশন (WebSocket)', 'রোল-ভিত্তিক অ্যাক্সেস কন্ট্রোল'],
                'tech_stack'      => ['Laravel 11', 'Next.js 14', 'MySQL', 'Tailwind CSS', 'Laravel Echo', 'Pusher'],
                'tags'            => ['saas', 'project-management', 'kanban', 'laravel', 'realtime'],
                'screenshots'     => [
                    ['url' => '/images/products/taskflow-1.jpg', 'alt_en' => 'Kanban Board', 'alt_bn' => 'কানবান বোর্ড', 'sort_order' => 1],
                    ['url' => '/images/products/taskflow-2.jpg', 'alt_en' => 'Dashboard', 'alt_bn' => 'ড্যাশবোর্ড', 'sort_order' => 2],
                ],
            ],
            [
                'category_slug'   => 'restaurant',
                'slug'            => 'foodhut-restaurant',
                'title_en'        => 'FoodHut — Restaurant & Online Ordering',
                'title_bn'        => 'ফুডহাট — রেস্তোরাঁ ও অনলাইন অর্ডারিং',
                'short_desc_en'   => 'Complete restaurant website with online menu, table booking, and food delivery ordering.',
                'short_desc_bn'   => 'অনলাইন মেনু, টেবিল বুকিং ও ডেলিভারি অর্ডারিংসহ সম্পূর্ণ রেস্তোরাঁ ওয়েবসাইট।',
                'description_en'  => "FoodHut is a restaurant management website that lets customers browse the menu, place delivery or pickup orders, and book tables online. Kitchen staff get a live order queue dashboard.",
                'description_bn'  => "ফুডহাট একটি রেস্তোরাঁ ম্যানেজমেন্ট ওয়েবসাইট যেখানে কাস্টমার মেনু ব্রাউজ করে, ডেলিভারি বা পিকআপ অর্ডার করতে এবং টেবিল বুক করতে পারে। রান্নাঘরের স্টাফ লাইভ অর্ডার কিউ ড্যাশবোর্ড পায়।",
                'price_bdt'       => 9999.00,
                'price_usd'       => 90.00,
                'preview_url'     => 'https://foodhut.demo.example.com',
                'thumbnail_url'   => '/images/products/foodhut-thumb.jpg',
                'is_featured'     => false,
                'is_active'       => true,
                'is_new'          => false,
                'sort_order'      => 3,
                'features_en'     => ['Digital menu with categories', 'Online delivery & pickup orders', 'Table reservation system', 'Kitchen order queue dashboard', 'Promo & discount management', 'Mobile-responsive design'],
                'features_bn'     => ['ক্যাটাগরিসহ ডিজিটাল মেনু', 'অনলাইন ডেলিভারি ও পিকআপ অর্ডার', 'টেবিল রিজার্ভেশন সিস্টেম', 'কিচেন অর্ডার কিউ ড্যাশবোর্ড', 'প্রমো ও ডিসকাউন্ট ম্যানেজমেন্ট', 'মোবাইল-রেসপন্সিভ ডিজাইন'],
                'tech_stack'      => ['Laravel 11', 'Blade + Alpine.js', 'MySQL', 'Tailwind CSS'],
                'tags'            => ['restaurant', 'food', 'ordering', 'booking'],
                'screenshots'     => [
                    ['url' => '/images/products/foodhut-1.jpg', 'alt_en' => 'Menu Page', 'alt_bn' => 'মেনু পেজ', 'sort_order' => 1],
                    ['url' => '/images/products/foodhut-2.jpg', 'alt_en' => 'Order Checkout', 'alt_bn' => 'অর্ডার চেকআউট', 'sort_order' => 2],
                ],
            ],
            [
                'category_slug'   => 'education',
                'slug'            => 'learnhub-lms',
                'title_en'        => 'LearnHub — Online Learning Management System',
                'title_bn'        => 'লার্নহাব — অনলাইন লার্নিং ম্যানেজমেন্ট সিস্টেম',
                'short_desc_en'   => 'LMS platform for educators to sell video courses with quizzes and certificates.',
                'short_desc_bn'   => 'কুইজ ও সার্টিফিকেটসহ ভিডিও কোর্স বিক্রির জন্য শিক্ষকদের LMS প্ল্যাটফর্ম।',
                'description_en'  => "LearnHub is a full-featured LMS where instructors create video courses with lessons, quizzes, and downloadable resources. Students enroll, track progress, and earn certificates upon completion.",
                'description_bn'  => "লার্নহাব একটি পূর্ণাঙ্গ LMS যেখানে শিক্ষকরা ভিডিও কোর্স, কুইজ ও ডাউনলোডযোগ্য রিসোর্স দিয়ে কোর্স তৈরি করেন। শিক্ষার্থীরা ভর্তি হয়, অগ্রগতি ট্র্যাক করে এবং সম্পন্ন হলে সার্টিফিকেট পায়।",
                'price_bdt'       => 17999.00,
                'price_usd'       => 162.00,
                'preview_url'     => 'https://learnhub.demo.example.com',
                'thumbnail_url'   => '/images/products/learnhub-thumb.jpg',
                'is_featured'     => true,
                'is_active'       => true,
                'is_new'          => true,
                'sort_order'      => 4,
                'features_en'     => ['Course & lesson builder', 'Video hosting integration', 'Quiz & assessment engine', 'Progress tracking', 'Auto-generated certificates', 'Instructor & student dashboards'],
                'features_bn'     => ['কোর্স ও লেসন বিল্ডার', 'ভিডিও হোস্টিং ইন্টিগ্রেশন', 'কুইজ ও অ্যাসেসমেন্ট ইঞ্জিন', 'প্রগ্রেস ট্র্যাকিং', 'স্বয়ংক্রিয় সার্টিফিকেট জেনারেশন', 'শিক্ষক ও শিক্ষার্থী ড্যাশবোর্ড'],
                'tech_stack'      => ['Laravel 11', 'Next.js 14', 'MySQL', 'Tailwind CSS', 'FFmpeg', 'S3'],
                'tags'            => ['lms', 'education', 'courses', 'elearning'],
                'screenshots'     => [
                    ['url' => '/images/products/learnhub-1.jpg', 'alt_en' => 'Course Listing', 'alt_bn' => 'কোর্স তালিকা', 'sort_order' => 1],
                    ['url' => '/images/products/learnhub-2.jpg', 'alt_en' => 'Lesson Player', 'alt_bn' => 'লেসন প্লেয়ার', 'sort_order' => 2],
                ],
            ],
            [
                'category_slug'   => 'business',
                'slug'            => 'corpsite-agency',
                'title_en'        => 'CorpSite — Agency & Corporate Website',
                'title_bn'        => 'কর্পসাইট — এজেন্সি ও কর্পোরেট ওয়েবসাইট',
                'short_desc_en'   => 'Professional corporate website template with services, portfolio, team, and blog.',
                'short_desc_bn'   => 'সার্ভিস, পোর্টফোলিও, টিম ও ব্লগসহ প্রফেশনাল কর্পোরেট ওয়েবসাইট টেমপ্লেট।',
                'description_en'  => "CorpSite is a pixel-perfect corporate website with animated sections for services, case studies, team members, and a CMS-powered blog. Built with SEO best practices and perfect Lighthouse scores.",
                'description_bn'  => "কর্পসাইট হলো অ্যানিমেটেড সার্ভিস, কেস স্টাডি, টিম মেম্বার এবং CMS-চালিত ব্লগসহ একটি পিক্সেল-পারফেক্ট কর্পোরেট ওয়েবসাইট। SEO বেস্ট প্র্যাকটিস ও পারফেক্ট Lighthouse স্কোর নিশ্চিত।",
                'price_bdt'       => 7999.00,
                'price_usd'       => 72.00,
                'preview_url'     => 'https://corpsite.demo.example.com',
                'thumbnail_url'   => '/images/products/corpsite-thumb.jpg',
                'is_featured'     => false,
                'is_active'       => true,
                'is_new'          => false,
                'sort_order'      => 5,
                'features_en'     => ['Animated hero & sections', 'Services & case studies', 'Team members section', 'CMS blog', 'Contact form with email', 'SEO optimised'],
                'features_bn'     => ['অ্যানিমেটেড হিরো ও সেকশন', 'সার্ভিস ও কেস স্টাডি', 'টিম মেম্বার সেকশন', 'CMS ব্লগ', 'ইমেইলসহ কন্টাক্ট ফর্ম', 'SEO অপ্টিমাইজড'],
                'tech_stack'      => ['Laravel 11', 'Next.js 14', 'MySQL', 'Tailwind CSS', 'Framer Motion'],
                'tags'            => ['corporate', 'agency', 'business', 'blog'],
                'screenshots'     => [
                    ['url' => '/images/products/corpsite-1.jpg', 'alt_en' => 'Homepage', 'alt_bn' => 'হোমপেজ', 'sort_order' => 1],
                ],
            ],
        ];

        foreach ($products as $data) {
            $catId = $categoryId($data['category_slug']);

            $productId = DB::table('products')->insertGetId([
                'category_id'    => $catId,
                'slug'           => $data['slug'],
                'title_en'       => $data['title_en'],
                'title_bn'       => $data['title_bn'],
                'short_desc_en'  => $data['short_desc_en'],
                'short_desc_bn'  => $data['short_desc_bn'],
                'description_en' => $data['description_en'],
                'description_bn' => $data['description_bn'],
                'price_bdt'      => $data['price_bdt'],
                'price_usd'      => $data['price_usd'],
                'preview_url'    => $data['preview_url'],
                'thumbnail_url'  => $data['thumbnail_url'],
                'is_featured'    => $data['is_featured'],
                'is_active'      => $data['is_active'],
                'is_new'         => $data['is_new'],
                'sort_order'     => $data['sort_order'],
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);

            // Features
            foreach ($data['features_en'] as $i => $featureEn) {
                DB::table('product_features')->insert([
                    'product_id'  => $productId,
                    'feature_en'  => $featureEn,
                    'feature_bn'  => $data['features_bn'][$i],
                    'sort_order'  => $i + 1,
                ]);
            }

            // Tech stack
            foreach ($data['tech_stack'] as $i => $tech) {
                DB::table('product_tech_stack')->insert([
                    'product_id' => $productId,
                    'tech_name'  => $tech,
                    'sort_order' => $i + 1,
                ]);
            }

            // Tags
            foreach ($data['tags'] as $tag) {
                DB::table('product_tags')->insert([
                    'product_id' => $productId,
                    'tag'        => $tag,
                ]);
            }

            // Screenshots
            foreach ($data['screenshots'] as $shot) {
                DB::table('product_screenshots')->insert([
                    'product_id'  => $productId,
                    'url'         => $shot['url'],
                    'alt_en'      => $shot['alt_en'],
                    'alt_bn'      => $shot['alt_bn'],
                    'sort_order'  => $shot['sort_order'],
                    'created_at'  => now(),
                ]);
            }
        }
    }
}
