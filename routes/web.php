<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\UserController; // Menambahkan UserController
use App\Http\Controllers\AuthController; // Menambahkan AuthController

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route untuk produk umum (user)
Route::get('/products', [UserController::class, 'index'])->name('user.products');
Route::get('/products/{id}', [UserController::class, 'show'])->name('user.products.show');

// Route untuk login dan register
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('register', [AuthController::class, 'register'])->name('register');

// Route logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk Admin Product CRUD - hanya untuk admin yang terautentikasi
Route::prefix('admin/products')->name('admin.products.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminProductController::class, 'index'])->name('index');
    Route::get('/create', [AdminProductController::class, 'create'])->name('create');
    Route::post('/', [AdminProductController::class, 'store'])->name('store');
    Route::get('/{product}/edit', [AdminProductController::class, 'edit'])->name('edit');
    Route::put('/{product}', [AdminProductController::class, 'update'])->name('update');
    Route::delete('/{product}', [AdminProductController::class, 'destroy'])->name('destroy');
});

