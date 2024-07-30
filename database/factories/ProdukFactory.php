<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\KemasanEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_produk' => fake()->colorName(),
            'kemasan' => KemasanEnum::getCollection()->random(),
            'harga' => fake()->numberBetween(5000, 20000),
            'production_per_day' => fake()->numberBetween(50, 2000),
        ];
    }
}
