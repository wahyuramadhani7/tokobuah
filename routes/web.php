<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\UserController; // Tambahkan UserController

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route untuk produk umum (user)
Route::get('/products', [UserController::class, 'index'])->name('user.products');
Route::get('/products/{id}', [UserController::class, 'show'])->name('user.products.show');

// Route untuk Admin Product CRUD
Route::prefix('admin/products')->name('admin.products.')->group(function () {
    Route::get('/', [AdminProductController::class, 'index'])->name('index');
    Route::get('/create', [AdminProductController::class, 'create'])->name('create');
    Route::post('/', [AdminProductController::class, 'store'])->name('store');
    Route::get('/{product}/edit', [AdminProductController::class, 'edit'])->name('edit');
    Route::put('/{product}', [AdminProductController::class, 'update'])->name('update');
    Route::delete('/{product}', [AdminProductController::class, 'destroy'])->name('destroy');
});
