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
        Schema::create('detail_jadwal_produksi', function (Blueprint $table) {
            $table->id('id_detail');
            $table->unsignedBigInteger('id_jadwal');
            $table->unsignedBigInteger('id_pesanan')->nullable();
            $table->double('flow_time');
            $table->double('lateness');
            $table->double('processing_time');
            $table->double('due_date');
            $table->timestamps();

            $table->foreign('id_jadwal')->references('id_jadwal')->on('jadwal_produksi')->onDelete('cascade');
            $table->foreign('id_pesanan')->references('id_pesanan')->on('pesanan')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_jadwal_produksi');
    }
};
