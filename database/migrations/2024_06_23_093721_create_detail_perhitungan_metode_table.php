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
        Schema::create('detail_perhitungan_metodes', function (Blueprint $table) {
            $table->id('id_detail_perhitungan_metode');
            $table->unsignedBigInteger('id_perhitungan_metode');
            $table->double('flow_time');
            $table->double('lateness');
            $table->double('processing_time');
            $table->timestamps();

            $table->foreign('id_perhitungan_metode')->references('id_perhitungan_metode')->on('perhitungan_metode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_perhitungan_metodes');
    }
};
