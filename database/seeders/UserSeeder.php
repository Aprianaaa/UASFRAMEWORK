<?php


namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // USER BIASA
        User::create([
            'name' => 'User Biasa',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user123'),
            'role' => 'user'
        ]);

        // ADMIN
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);

        // SUPERADMIN
        User::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('superadmin123'),
            'role' => 'superadmin'
        ]);
    }
}
