@extends('layouts.app')

@section('content')
<div class="container py-2">
    <div class="row justify-content-center">
        <div class="col-md-7">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h3 class="fw-bold text-dark mb-0"><i class="bi bi-pencil-square text-primary me-2"></i>Edit Data Pemilih</h3>
                    <p class="text-muted">Perbarui informasi peserta pemilihan (DPT).</p>
                </div>
                <a href="{{ route('dpt.index') }}" class="btn btn-light rounded-pill border shadow-sm px-4 fw-bold">Kembali</a>
            </div>

            <div class="glass-card p-5">
                <form action="{{ route('dpt.update', $dpt->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-dark ps-2">NISN / NIP Guru</label>
                        <input type="number" name="nisn" class="form-control form-control-glass ps-4 @error('nisn') is-invalid @enderror" value="{{ old('nisn', $dpt->nisn) }}" required>
                        @error('nisn')<span class="invalid-feedback ps-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-dark ps-2">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control form-control-glass ps-4 @error('nama') is-invalid @enderror" value="{{ old('nama', $dpt->nama) }}" required>
                        @error('nama')<span class="invalid-feedback ps-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-dark ps-2">Kelas / Jabatan</label>
                        <input type="text" name="kelas" class="form-control form-control-glass ps-4 @error('kelas') is-invalid @enderror" value="{{ old('kelas', $dpt->kelas) }}" required>
                        @error('kelas')<span class="invalid-feedback ps-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-5">
                        <label class="form-label fw-semibold text-dark ps-2">Username Login</label>
                        <input type="text" name="username" class="form-control form-control-glass ps-4 @error('username') is-invalid @enderror" value="{{ old('username', $dpt->username) }}" required>
                        @error('username')<span class="invalid-feedback ps-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary rounded-pill px-5 py-2 fw-bold shadow-sm" style="background: #007aff; border: none;">
                            <i class="bi bi-check-circle me-1"></i> Perbarui Data
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection