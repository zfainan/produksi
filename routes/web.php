<?php

declare(strict_types=1);

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
});

Auth::routes(['register' => false, 'reset' => false]);

Route::view('/test', 'layouts.app')->name('test');
