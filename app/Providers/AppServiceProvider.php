<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware; // Pastikan untuk mengimport AdminMiddleware

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Mendaftarkan custom middleware admin
        Route::middlewareGroup('admin', [
            AdminMiddleware::class, // Daftarkan middleware admin
        ]);
    }
}
