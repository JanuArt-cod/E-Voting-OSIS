@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <!-- Kartu Login dengan efek Glassmorphism -->
    <div class="glass-card p-5" style="width: 100%; max-width: 420px;">
        
        <div class="text-center mb-4">
            <div class="d-inline-flex justify-content-center align-items-center bg-white rounded-circle shadow-sm mb-3" style="width: 70px; height: 70px;">
                <i class="bi bi-fingerprint text-primary" style="font-size: 2.5rem;"></i>
            </div>
            <h4 class="fw-bold text-dark">Sistem Panitia</h4>
            <p class="text-muted small mb-0">E-Voting Pemilihan OSIS</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Input Username -->
            <div class="mb-4">
                <label for="username" class="form-label fw-semibold text-dark ps-2 mb-1">Username</label>
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-0 position-absolute" style="z-index: 10; top: 8px; color: #6c757d;">
                        <i class="bi bi-person-fill"></i>
                    </span>
                    <input id="username" type="text" class="form-control form-control-glass ps-5 @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Masukkan username">
                </div>
                @error('username')
                    <span class="invalid-feedback d-block ps-2 mt-1" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Input Password -->
            <div class="mb-4">
                <label for="password" class="form-label fw-semibold text-dark ps-2 mb-1">Kata Sandi</label>
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-0 position-absolute" style="z-index: 10; top: 8px; color: #6c757d;">
                        <i class="bi bi-lock-fill"></i>
                    </span>
                    <input id="password" type="password" class="form-control form-control-glass ps-5 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••">
                </div>
                @error('password')
                    <span class="invalid-feedback d-block ps-2 mt-1" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="mb-4 form-check ms-1">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label text-dark small" for="remember">
                    Ingat Sesi Saya
                </label>
            </div>

            <!-- Tombol Login -->
            <div class="d-grid mt-2">
                <button type="submit" class="btn btn-primary rounded-pill py-2 fw-bold shadow-sm" style="background: #007aff; border: none; font-size: 1.1rem;">
                    Masuk <i class="bi bi-arrow-right-circle ms-1"></i>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection