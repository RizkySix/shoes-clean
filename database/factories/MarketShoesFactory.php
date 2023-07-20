<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MarketShoes>
 */
class MarketShoesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug_id' => fake()->uuid(),
            'user_id' => mt_rand(80,99),
            'pemilik_toko' => fake()->name(),
            'nama_toko' => fake()->company(),
            'alamat' => fake()->streetAddress(),
            'no_hp' => fake()->phoneNumber(),
            'email_toko' => fake()->email(),
            'foto_toko' => 'Image'
        ];
    }
}
