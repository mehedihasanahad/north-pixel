<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'slug'       => 'ecommerce',
                'name_en'    => 'E-Commerce',
                'name_bn'    => 'ই-কমার্স',
                'icon'       => 'shopping-cart',
                'sort_order' => 1,
                'is_active'  => true,
            ],
            [
                'slug'       => 'business',
                'name_en'    => 'Business',
                'name_bn'    => 'ব্যবসা',
                'icon'       => 'briefcase',
                'sort_order' => 2,
                'is_active'  => true,
            ],
            [
                'slug'       => 'saas',
                'name_en'    => 'SaaS / Web App',
                'name_bn'    => 'স্যাস / ওয়েব অ্যাপ',
                'icon'       => 'cloud',
                'sort_order' => 3,
                'is_active'  => true,
            ],
            [
                'slug'       => 'portfolio',
                'name_en'    => 'Portfolio',
                'name_bn'    => 'পোর্টফোলিও',
                'icon'       => 'user',
                'sort_order' => 4,
                'is_active'  => true,
            ],
            [
                'slug'       => 'restaurant',
                'name_en'    => 'Restaurant & Food',
                'name_bn'    => 'রেস্তোরাঁ ও খাবার',
                'icon'       => 'utensils',
                'sort_order' => 5,
                'is_active'  => true,
            ],
            [
                'slug'       => 'education',
                'name_en'    => 'Education',
                'name_bn'    => 'শিক্ষা',
                'icon'       => 'book-open',
                'sort_order' => 6,
                'is_active'  => true,
            ],
        ];

        DB::table('categories')->insertOrIgnore($categories);
    }
}
