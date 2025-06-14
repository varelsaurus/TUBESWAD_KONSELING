<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Keluhan;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Create 10 Mahasiswa and for each, create a Keluhan linked to it
        // \App\Models\Mahasiswa::factory(10)->create()->each(function ($mahasiswa) {
        //     \App\Models\Keluhan::factory()->create([
        //         'mahasiswaId' => $mahasiswa->mahasiswaId,
        //     ]);
        // });
        Mahasiswa::factory()->create([
            'mahasiswaId' => '1',
            'nama' => 'Fedayeen Fathurrahman',
        ]);

        $this->call([
            AdminSeeder::class
        ]);
    }
}
