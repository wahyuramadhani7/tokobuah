@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm" data-aos="fade-up">
                <div class="card-body">
                    <h1 class="mb-4 text-center">Lupa Password</h1>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('forgot.password.send') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Kirim Tautan Reset Password</button>
                    </form>
                    <p class="mt-3 text-center"><a href="{{ route('login') }}">Kembali ke Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection