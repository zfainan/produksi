<?php

declare(strict_types=1);

use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\DetailPesananController;
use App\Http\Controllers\JadwalProduksiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::resource('users', UserController::class);

    Route::resource('produk', ProdukController::class);

    Route::resource('bahan-baku', BahanBakuController::class);

    Route::resource('pelanggan', PelangganController::class);

    Route::resource('pesanan', PesananController::class);

    Route::resource('detail-pesanan', DetailPesananController::class)
        ->only(['create', 'store', 'destroy']);

    Route::resource('jadwal', JadwalProduksiController::class);
});

Auth::routes(['register' => false, 'reset' => false]);

Route::view('/test', 'layouts.app')->name('test');
