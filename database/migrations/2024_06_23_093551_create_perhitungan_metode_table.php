<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('perhitungan_metode', function (Blueprint $table) {
            $table->id('id_perhitungan_metode');
            $table->unsignedBigInteger('id_pesanan');
            $table->double('rrwp');
            $table->double('rrjp');
            $table->double('utilisasi');
            $table->double('rrwk');
            $table->timestamps();

            $table->foreign('id_pesanan')->references('id_pesanan')->on('pesanan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perhitungan_metode');
    }
};
