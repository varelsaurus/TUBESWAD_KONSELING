<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Keluhan>
 */
class KeluhanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pesan' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['baru', 'diproses', 'selesai']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
