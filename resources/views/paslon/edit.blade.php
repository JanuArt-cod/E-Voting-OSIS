@extends('layouts.app')

@section('content')
<div class="container py-2">
    <div class="row justify-content-center">
        <div class="col-md-9">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h3 class="fw-bold text-dark mb-0"><i class="bi bi-pencil-square text-primary me-2"></i>Edit Data Paslon</h3>
                    <p class="text-muted">Perbarui informasi pasangan calon ketua dan wakil OSIS.</p>
                </div>
                <a href="{{ route('paslon.index') }}" class="btn btn-light rounded-pill border shadow-sm px-4 fw-bold">Kembali</a>
            </div>

            <div class="glass-card p-5">
                <!-- FORM MENGGUNAKAN METHOD POST, TAPI KITA TIMPA DENGAN @method('PUT') -->
                <form action="{{ route('paslon.update', $paslon->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <label class="form-label fw-semibold text-dark ps-2">Nomor Urut</label>
                            <input type="number" name="nomor_urut" class="form-control form-control-glass ps-4 @error('nomor_urut') is-invalid @enderror" value="{{ old('nomor_urut', $paslon->nomor_urut) }}" required>
                            @error('nomor_urut')<span class="invalid-feedback ps-2">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold text-dark ps-2">Nama Calon Ketua</label>
                            <input type="text" name="nama_ketua" class="form-control form-control-glass ps-4 @error('nama_ketua') is-invalid @enderror" value="{{ old('nama_ketua', $paslon->nama_ketua) }}" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold text-dark ps-2">Nama Calon Wakil</label>
                            <input type="text" name="nama_wakil" class="form-control form-control-glass ps-4 @error('nama_wakil') is-invalid @enderror" value="{{ old('nama_wakil', $paslon->nama_wakil) }}" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-dark ps-2">Visi</label>
                        <textarea name="visi" class="form-control form-control-glass ps-4 @error('visi') is-invalid @enderror" rows="3" required>{{ old('visi', $paslon->visi) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-dark ps-2">Misi</label>
                        <textarea name="misi" class="form-control form-control-glass ps-4 @error('misi') is-invalid @enderror" rows="4" required>{{ old('misi', $paslon->misi) }}</textarea>
                    </div>

                    <div class="mb-5">
                        <label class="form-label fw-semibold text-dark ps-2">Ganti Foto Paslon (Biarkan kosong jika tidak diganti)</label>
                        <input type="file" name="foto" class="form-control form-control-glass ps-4 @error('foto') is-invalid @enderror" accept="image/*">
                        @if($paslon->foto)
                            <small class="text-success ms-2 mt-2 d-block"><i class="bi bi-check-circle-fill"></i> Paslon ini sudah memiliki foto tersimpan.</small>
                        @endif
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary rounded-pill px-5 py-2 fw-bold shadow-sm">
                            <i class="bi bi-check-circle me-1"></i> Perbarui Data
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection