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
        Schema::create('pengajuan_bahan_baku', function (Blueprint $table) {
            $table->id('id_pengajuan');
            $table->unsignedBigInteger('id_pesanan');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_bahan');
            $table->date('tanggal_pengajuan');
            $table->integer('jumlah');
            $table->string('satuan', 10);
            $table->timestamps();

            $table->foreign('id_bahan')->references('id_bahan')->on('bahan_baku');
            $table->foreign('id_pesanan')->references('id_pesanan')->on('pesanan');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_bahan_baku');
    }
};
