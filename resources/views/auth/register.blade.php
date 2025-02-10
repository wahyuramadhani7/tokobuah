@extends('layouts.auth')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-5">
        <div class="card shadow-lg border-0 rounded-4 p-4" data-aos="fade-up">
            <div class="card-body">
                <h2 class="mb-4 text-center fw-bold text-primary">Register</h2>
                @if(session('error'))
                    <div class="alert alert-danger text-center">{{ session('error') }}</div>
                @endif
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nama</label>
                        <input type="text" name="name" id="name" class="form-control rounded-3 shadow-sm" placeholder="Masukkan nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" id="email" class="form-control rounded-3 shadow-sm" placeholder="Masukkan email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input type="password" name="password" id="password" class="form-control rounded-3 shadow-sm" placeholder="Masukkan password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control rounded-3 shadow-sm" placeholder="Konfirmasi password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2 rounded-3 shadow-sm">Daftar</button>
                </form>
                <div class="text-center mt-3">
                    <span>Sudah punya akun? </span>
                    <a href="{{ route('login.form') }}" class="text-decoration-none text-primary fw-semibold">Login sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
