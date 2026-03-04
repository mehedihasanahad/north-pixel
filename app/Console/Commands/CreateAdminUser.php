<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdminUser extends Command
{
    protected $signature   = 'admin:create';
    protected $description = 'Create an admin user for the Filament panel';

    public function handle(): void
    {
        $name     = $this->ask('Name');
        $email    = $this->ask('Email');
        $password = $this->secret('Password');

        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name'      => $name,
                'phone'     => '',
                'password'  => bcrypt($password),
                'role'      => 'admin',
                'is_active' => true,
            ]
        );

        $this->info("Admin user [{$user->email}] created/updated successfully.");
        $this->info('Login at: ' . url('/admin'));
    }
}
