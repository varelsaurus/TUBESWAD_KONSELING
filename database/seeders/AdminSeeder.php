<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Konselor;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password123'),
            'role' => 'admin'
        ]);

        // Tambahkan juga user konselor dan mahasiswa untuk testing
        User::create([
            'name' => 'Konselor Test',
            'email' => 'konselor@test.com',
            'password' => Hash::make('password123'),
            'role' => 'konselor'
        ]);

        User::create([
            'name' => 'Mahasiswa Test',
            'email' => 'mahasiswa@test.com',
            'password' => Hash::make('password123'),
            'role' => 'mahasiswa'
        ]);

        // Create Konselor Profile
        Konselor::create([
            'nama' => 'Konselor',
            'spesialisasi' => 'Konseling Akademik',
            'kontak' => '081234567890'
        ]);
    }
} 