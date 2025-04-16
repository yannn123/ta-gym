<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('user123'),
            'no_hp' => '081234567890',
            'alamat' => 'Alamat Admin',
            'role' => 'admin',
            'expired_date' => now()->addYear(),
        ]);

        // User::create([
        //     'name' => 'brian',
        //     'email' => 'brian@example.com',
        //     'password' => Hash::make('user123'),
        //     'no_hp' => '081234567891',
        //     'alamat' => 'Klojen',
        //     'role' => 'user',
        //     'expired_date' => now()->addYear(),
        // ]);

        // User::create([
        //     'name' => 'atha',
        //     'email' => 'brian@example.com',
        //     'password' => Hash::make('user123'),
        //     'no_hp' => '081234567891',
        //     'alamat' => 'Klojen',
        //     'role' => 'user',
        //     'expired_date' => now()->addYear(),
        // ]);
    }
}