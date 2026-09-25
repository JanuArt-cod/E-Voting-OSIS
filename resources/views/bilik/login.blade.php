@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="glass-card p-5" style="width: 100%; max-width: 450px; background: rgba(255,255,255,0.7);">
        
        <div class="text-center mb-4">
            <div class="d-inline-flex justify-content-center align-items-center rounded-circle shadow-sm mb-3" style="width: 80px; height: 80px; background: linear-gradient(135deg, #007aff, #00c6ff);">
                <i class="bi bi-box2-heart-fill text-white" style="font-size: 2.5rem;"></i>
            </div>
            <h3 class="fw-bold text-dark">Bilik Suara Digital</h3>
            <p class="text-muted small mb-0">Gunakan Hak Pilih Anda dengan Bijak</p>
        </div>

        <form method="POST" action="{{ route('bilik.authenticate') }}">
            @csrf

            @if(session('error'))
                <div class="alert alert-danger border-0 shadow-sm rounded-3 py-2 text-center mb-4">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                </div>
            @endif

            <div class="mb-4">
                <label class="form-label fw-bold text-dark ps-2 mb-1">Username Siswa</label>
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-0 position-absolute" style="z-index: 10; top: 8px; color: #6c757d;">
                        <i class="bi bi-person-badge-fill"></i>
                    </span>
                    <input type="text" class="form-control form-control-glass ps-5 text-center fw-semibold fs-5" name="username" value="{{ old('username') }}" required autocomplete="off" placeholder="NISN / Username">
                </div>
            </div>

            <div class="mb-5">
                <label class="form-label fw-bold text-dark ps-2 mb-1">Token Akses</label>
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-0 position-absolute" style="z-index: 10; top: 8px; color: #6c757d;">
                        <i class="bi bi-key-fill"></i>
                    </span>
                    <input type="text" class="form-control form-control-glass ps-5 text-center fw-bold fs-4 text-primary" name="token" required autocomplete="off" placeholder="XXXXXX" style="letter-spacing: 3px; text-transform: uppercase;">
                </div>
            </div>

            <div class="d-grid mt-2">
                <button type="submit" class="btn btn-primary rounded-pill py-3 fw-bold shadow-sm fs-5" style="background: #007aff; border: none;">
                    Masuk Bilik Suara <i class="bi bi-arrow-right-circle ms-2"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- SCRIPT OTOMATIS FULL SCREEN TANPA TOMBOL -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Otomatis meminta layar penuh saat halaman pertama kali diklik atau disentuh oleh siswa
        function triggerFullScreen() {
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen().catch(err => {
                    console.log("Full screen diabaikan browser:", err.message);
                });
            }
        }

        // Picu otomatis saat ada interaksi pertama di layar (klik/sentuh)
        window.addEventListener('click', triggerFullScreen, { once: true });
        window.addEventListener('touchstart', triggerFullScreen, { once: true });
    });
</script>
@endsection