@extends('layouts.app')

@section('content')
<div class="container py-2">
    <div class="row justify-content-center">
        <div class="col-md-7">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h3 class="fw-bold text-dark mb-0"><i class="bi bi-pencil-square text-primary me-2"></i>Edit Akun Panitia</h3>
                </div>
                <a href="{{ route('panitia.index') }}" class="btn btn-light rounded-pill border shadow-sm px-4 fw-bold">Kembali</a>
            </div>

            <div class="glass-card p-5">
                <form action="{{ route('panitia.update', $panitia->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="form-label fw-semibold text-dark ps-2">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control form-control-glass ps-4 @error('name') is-invalid @enderror" value="{{ old('name', $panitia->name) }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-dark ps-2">Username Login</label>
                        <input type="text" name="username" class="form-control form-control-glass ps-4 @error('username') is-invalid @enderror" value="{{ old('username', $panitia->username) }}" required>
                        @error('username')<span class="invalid-feedback ps-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-dark ps-2">Kata Sandi Baru (Opsional)</label>
                        <input type="password" name="password" class="form-control form-control-glass ps-4 @error('password') is-invalid @enderror">
                        <small class="text-muted ms-2 mt-1 d-block">Kosongkan kolom ini jika tidak ingin mengganti password.</small>
                        @error('password')<span class="invalid-feedback ps-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-5">
                        <label class="form-label fw-semibold text-dark ps-2">Hak Akses (Role)</label>
                        <select name="role" class="form-select form-control-glass ps-4 @error('role') is-invalid @enderror" required>
                            <option value="operator" {{ (old('role', $panitia->role) == 'operator') ? 'selected' : '' }}>Operator (Petugas Bilik)</option>
                            <option value="superadmin" {{ (old('role', $panitia->role) == 'superadmin') ? 'selected' : '' }}>Super Admin (Hak Akses Penuh)</option>
                        </select>
                        <!-- KOTAK HAK AKSES (Disembunyikan secara default) -->
                        <div class="mb-5 p-4 rounded-4" id="box-akses-menu" style="display: none; background: rgba(255, 255, 255, 0.4); border: 1px solid rgba(255,255,255,0.7);">
                            <label class="form-label fw-bold text-dark mb-3"><i class="bi bi-shield-lock-fill text-primary me-2"></i>Pilih Izin Akses Menu</label>
                            <p class="text-muted small mb-3">Menu Panitia dan Hasil Voting mutlak hanya untuk Super Admin.</p>
                            
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" name="menu_access[]" value="paslon" id="akses_paslon">
                                <label class="form-check-label fw-semibold" for="akses_paslon">Manajemen Data Paslon</label>
                            </div>
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" name="menu_access[]" value="dpt" id="akses_dpt">
                                <label class="form-check-label fw-semibold" for="akses_dpt">Manajemen Data Pemilih (DPT)</label>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary rounded-pill px-5 py-2 fw-bold shadow-sm" style="background: #007aff; border: none;">
                            <i class="bi bi-check-circle me-1"></i> Perbarui Akun
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // Memunculkan kotak hak akses hanya jika role yang dipilih adalah 'operator'
    document.querySelector('select[name="role"]').addEventListener('change', function() {
        if(this.value === 'operator') {
            document.getElementById('box-akses-menu').style.display = 'block';
        } else {
            document.getElementById('box-akses-menu').style.display = 'none';
        }
    });
</script>
@endsection