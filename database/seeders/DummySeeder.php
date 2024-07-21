<?php

namespace Database\Seeders;

use App\Models\BahanBaku;
use App\Models\Pelanggan;
use App\Models\Produk;
use Illuminate\Database\Seeder;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produk::factory()->count(5)->create();
        BahanBaku::factory()->count(5)->create();
        Pelanggan::factory()->count(5)->create();
    }
}
