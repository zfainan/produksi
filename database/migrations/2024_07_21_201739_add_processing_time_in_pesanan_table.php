<?php

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
        Schema::table('pesanan', function (Blueprint $table) {
            $table->integer('total_processing_time')->nullable();
        });

        Schema::table('detail_pesanan', function (Blueprint $table) {
            $table->integer('processing_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesanan', function (Blueprint $table) {
            $table->dropColumn('total_processing_time');
        });

        Schema::table('detail_pesanan', function (Blueprint $table) {
            $table->dropColumn('processing_time');
        });
    }
};
