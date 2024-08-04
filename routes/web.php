<?php

declare(strict_types=1);

use App\Http\Controllers\AgendaProduksiController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\DetailPesananController;
use App\Http\Controllers\DetailProdukController;
use App\Http\Controllers\JadwalProduksiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PengajuanBahanBakuController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    // master data
    Route::prefix('master-data')->group(function () {
        Route::resource('users', UserController::class);

        Route::resource('produk', ProdukController::class);

        Route::resource('detail-produk', DetailProdukController::class)
            ->only(['create', 'store', 'destroy']);

        Route::resource('bahan-baku', BahanBakuController::class);

        Route::post('bahan-baku/{bahan_baku}/update-stok', [BahanBakuController::class, 'updateStok'])->name('bahan-baku.update-stok');

        Route::resource('pelanggan', PelangganController::class);
    });

    // transaksi
    Route::prefix('transaksi')->group(function () {
        Route::resource('pesanan', PesananController::class);

        Route::resource('detail-pesanan', DetailPesananController::class)
            ->only(['create', 'store', 'destroy']);

        Route::resource('pengajuan-bahan', PengajuanBahanBakuController::class);
        Route::post('pengajuan-bahan/{pengajuan_bahan}/approve', [PengajuanBahanBakuController::class, 'approve'])->name('pengajuan-bahan.approve');
    });

    // produksi
    Route::prefix('produksi')->group(function () {
        Route::resource('jadwal', JadwalProduksiController::class);

        Route::get('agenda-produksi', AgendaProduksiController::class)->name('produksi.agenda');
    });

    // laporan
    Route::prefix('reports')->as('reports.')->group(function () {
        // pesanan
        Route::get('pesanan', [ReportController::class, 'createPesanan'])->name('pesanan.create');
        Route::post('pesanan', [ReportController::class, 'generatePesanan'])->name('pesanan');

        // jadwal produksi
        Route::get('jadwal', [ReportController::class, 'createJadwal'])->name('jadwal.create');
        Route::post('jadwal', [ReportController::class, 'generateJadwal'])->name('jadwal');

        // penggunaan bahan baku
        Route::get('pengajuan-bahan', [ReportController::class, 'createPengajuanBahan'])->name('pengajuan-bahan.create');
        Route::post('pengajuan-bahan', [ReportController::class, 'generatePengajuanBahan'])->name('pengajuan-bahan');
    });
});

Auth::routes(['register' => false, 'reset' => false]);

Route::view('/test', 'layouts.app')->name('test');
