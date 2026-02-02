<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Akun Orang Tua / User
        User::create([
            'name' => 'Faisal',
            'email' => 'faisal@gmail.com',
            'password' => Hash::make('faisal'),
            'role' => 'orangtua',
        ]);
    }
}