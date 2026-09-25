@extends('layouts.app')

@section('content')
<div class="container py-2">
    <div class="row justify-content-center">
        <div class="col-md-9">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h3 class="fw-bold text-dark mb-0"><i class="bi bi-person-plus-fill text-primary me-2"></i>Tambah Data Paslon</h3>
                    <p class="text-muted">Masukkan informasi pasangan calon ketua dan wakil OSIS yang baru.</p>
                </div>
                <a href="{{ route('paslon.index') }}" class="btn btn-light rounded-pill border shadow-sm px-4 fw-bold">Kembali</a>
            </div>

            <!-- KARTU FORM TRANSPARAN ALA IOS -->
            <div class="glass-card p-5">
                <form action="{{ route('paslon.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <label class="form-label fw-semibold text-dark ps-2">Nomor Urut</label>
                            <input type="number" name="nomor_urut" class="form-control form-control-glass ps-4 @error('nomor_urut') is-invalid @enderror" value="{{ old('nomor_urut') }}" required>
                            @error('nomor_urut')<span class="invalid-feedback ps-2">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold text-dark ps-2">Nama Calon Ketua</label>
                            <input type="text" name="nama_ketua" class="form-control form-control-glass ps-4 @error('nama_ketua') is-invalid @enderror" value="{{ old('nama_ketua') }}" required>
                            @error('nama_ketua')<span class="invalid-feedback ps-2">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold text-dark ps-2">Nama Calon Wakil</label>
                            <input type="text" name="nama_wakil" class="form-control form-control-glass ps-4 @error('nama_wakil') is-invalid @enderror" value="{{ old('nama_wakil') }}" required>
                            @error('nama_wakil')<span class="invalid-feedback ps-2">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-dark ps-2">Visi</label>
                        <textarea name="visi" class="form-control form-control-glass ps-4 @error('visi') is-invalid @enderror" rows="3" required>{{ old('visi') }}</textarea>
                        @error('visi')<span class="invalid-feedback ps-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-dark ps-2">Misi</label>
                        <textarea name="misi" class="form-control form-control-glass ps-4 @error('misi') is-invalid @enderror" rows="4" required>{{ old('misi') }}</textarea>
                        @error('misi')<span class="invalid-feedback ps-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-5">
                        <label class="form-label fw-semibold text-dark ps-2">Upload Foto Paslon (Opsional)</label>
                        <input type="file" name="foto" class="form-control form-control-glass ps-4 @error('foto') is-invalid @enderror" accept="image/*">
                        <small class="text-muted ms-2 mt-1 d-block">Format: JPG, JPEG, PNG. Maksimal 2MB.</small>
                        @error('foto')<span class="invalid-feedback ps-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary rounded-pill px-5 py-2 fw-bold shadow-sm" style="background: #007aff; border: none;">
                            <i class="bi bi-plus-circle me-1"></i> Simpan Kandidat
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection