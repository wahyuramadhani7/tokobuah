<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Memeriksa apakah user terautentikasi dan memiliki status is_admin
        if (Auth::check() && Auth::user()->is_admin) {
            // Jika admin, lanjutkan ke request berikutnya
            return $next($request);
        }

        // Jika bukan admin, arahkan ke halaman login dengan pesan kesalahan
        return redirect()->route('login.form')
                         ->with('error', 'Akses ditolak. Anda bukan admin.');
    }
}
