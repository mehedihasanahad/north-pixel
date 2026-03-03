<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            SiteSettingsSeeder::class,
        ]);

        // Admin user
        User::firstOrCreate(
            ['email' => 'admin@devcraft.com.bd'],
            [
                'name'               => 'Admin',
                'phone'              => '+8801700000000',
                'password'           => Hash::make('password'),
                'role'               => 'admin',
                'email_verified_at'  => now(),
                'preferred_language' => 'en',
                'is_active'          => true,
            ]
        );

        // Test regular user
        User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name'               => 'Test User',
                'phone'              => '+8801800000000',
                'password'           => Hash::make('password'),
                'role'               => 'user',
                'email_verified_at'  => now(),
                'preferred_language' => 'bn',
                'is_active'          => true,
            ]
        );
    }
}
