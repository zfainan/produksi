<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\SatuanEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BahanBaku>
 */
class BahanBakuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_bahan_baku' => fake()->colorName(),
            'satuan' => SatuanEnum::getCollection()->random(),
            'stok' => fake()->numberBetween(10, 2000),
        ];
    }
}
