<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Menampilkan form register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input login
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        // Mencoba login dengan kredensial
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika user adalah admin, alihkan ke halaman admin produk
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.products.index')->with('success', 'Login berhasil sebagai Admin');
            }

            // Redirect ke halaman produk setelah login berhasil (untuk user biasa)
            return redirect()->route('user.products')->with('success', 'Login berhasil');
        } else {
            // Kembali dengan pesan error jika login gagal
            return redirect()->back()->with('error', 'Email atau password salah');
        }
    }

    // Proses register
    public function register(Request $request)
    {
        // Validasi input registrasi
        $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|string|confirmed|min:6', // pastikan ada konfirmasi password
            'password_confirmation' => 'required|string|min:6', // validasi konfirmasi password
        ]);

        try {
            // Membuat user baru
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Login otomatis setelah registrasi berhasil
            Auth::login($user);

            // Redirect ke halaman login setelah registrasi berhasil
            return redirect()->route('login.form')->with('success', 'Registrasi berhasil, silakan login.');
        } catch (\Exception $e) {
            // Kembali dengan pesan error jika terjadi kesalahan
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Logout
    public function logout()
    {
        Auth::logout(); // Logout user

        // Redirect ke halaman login setelah logout
        return redirect()->route('login.form')->with('success', 'Logout berhasil');
    }
}
