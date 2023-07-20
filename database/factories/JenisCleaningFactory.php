<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JenisCleaning>
 */
class JenisCleaningFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'market_shoe_id' => mt_rand(1, 10),
            'nama_cleaning' => fake()->sentence(3),
            'category_cleaning' => 'Normal Cleaning',
            'harga' => mt_rand(10000, 50000)
        ];
    }
}
