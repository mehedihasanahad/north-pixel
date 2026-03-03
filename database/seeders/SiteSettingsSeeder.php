<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name_en',          'value' => 'DevCraft',                             'description' => 'Site name in English'],
            ['key' => 'site_name_bn',          'value' => 'ডেভক্রাফট',                           'description' => 'Site name in Bangla'],
            ['key' => 'site_tagline_en',       'value' => 'Ready-Made Web Apps for Your Business','description' => 'Site tagline in English'],
            ['key' => 'site_tagline_bn',       'value' => 'আপনার ব্যবসার জন্য রেডি-মেড ওয়েব অ্যাপ', 'description' => 'Site tagline in Bangla'],
            ['key' => 'contact_email',         'value' => 'hello@devcraft.com.bd',                'description' => 'Primary contact email'],
            ['key' => 'whatsapp_number',       'value' => '+8801700000000',                       'description' => 'WhatsApp contact number (with country code)'],
            ['key' => 'messenger_url',         'value' => 'https://m.me/devcraftbd',              'description' => 'Facebook Messenger URL'],
            ['key' => 'facebook_url',          'value' => 'https://facebook.com/devcraftbd',      'description' => 'Facebook page URL'],
            ['key' => 'linkedin_url',          'value' => '',                                     'description' => 'LinkedIn page URL'],
            ['key' => 'youtube_url',           'value' => '',                                     'description' => 'YouTube channel URL'],
            ['key' => 'address_en',            'value' => 'Dhaka, Bangladesh',                    'description' => 'Office address in English'],
            ['key' => 'address_bn',            'value' => 'ঢাকা, বাংলাদেশ',                      'description' => 'Office address in Bangla'],
            ['key' => 'whatsapp_order_msg_en', 'value' => "Hi, I'm interested in buying: {product_title}. Please send me details.", 'description' => 'WhatsApp pre-filled order message (English). Use {product_title} placeholder.'],
            ['key' => 'whatsapp_order_msg_bn', 'value' => "হ্যালো, আমি এই পণ্যটি কিনতে আগ্রহী: {product_title}। দয়া করে বিস্তারিত জানান।", 'description' => 'WhatsApp pre-filled order message (Bangla). Use {product_title} placeholder.'],
            ['key' => 'preview_token_ttl_hours', 'value' => '24',                                 'description' => 'Preview token validity in hours'],
            ['key' => 'maintenance_mode',      'value' => '0',                                    'description' => '1 = site under maintenance, 0 = live'],
        ];

        foreach ($settings as &$row) {
            $row['updated_at'] = now();
        }

        DB::table('site_settings')->insertOrIgnore($settings);
    }
}
