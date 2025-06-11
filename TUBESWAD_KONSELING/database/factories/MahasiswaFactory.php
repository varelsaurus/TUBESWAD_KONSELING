<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'mahasiswaId' => $this->faker->unique()->numberBetween(1, 1000), // Assuming mahasiswaId is an integer
            'nama' => $this->faker->name(),
            'nim' => $this->faker->unique()->numerify('########'),
            'kontak' => $this->faker->phoneNumber(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
