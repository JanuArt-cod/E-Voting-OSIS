@extends('layouts.app')

@section('content')
<div class="container py-2">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-dark mb-0"><i class="bi bi-person-badge text-primary me-2"></i>Tambah Pemilih (DPT)</h3>
            <p class="text-muted">Input manual atau upload file CSV untuk memasukkan data sekaligus.</p>
        </div>
        <a href="{{ route('dpt.index') }}" class="btn btn-light rounded-pill border shadow-sm px-4 fw-bold">Kembali</a>
    </div>

    <div class="row">
        <!-- Kolom Kiri: Input Manual -->
        <div class="col-md-6 mb-4">
            <div class="glass-card p-4 h-100">
                <h5 class="fw-bold mb-4"><i class="bi bi-keyboard me-2"></i>Input Satu Per Satu</h5>
                <form action="{{ route('dpt.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold ps-1">NISN / NIP Guru</label>
                        <input type="number" name="nisn" class="form-control form-control-glass @error('nisn') is-invalid @enderror" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold ps-1">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control form-control-glass @error('nama') is-invalid @enderror" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold ps-1">Kelas / Jabatan</label>
                        <input type="text" name="kelas" placeholder="Cth: XII MIPA 1 / Guru" class="form-control form-control-glass @error('kelas') is-invalid @enderror" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold ps-1">Username Login</label>
                        <input type="text" name="username" class="form-control form-control-glass @error('username') is-invalid @enderror" required>
                    </div>
                    <button type="submit" class="btn btn-primary rounded-pill w-100 py-2 fw-bold shadow-sm">Simpan Manual</button>
                </form>
            </div>
        </div>

        <!-- Kolom Kanan: Upload CSV -->
        <div class="col-md-6 mb-4">
            <div class="glass-card p-4 h-100 d-flex flex-column">
                <h5 class="fw-bold mb-4"><i class="bi bi-filetype-csv me-2 text-success"></i>Upload File CSV Massal</h5>
                
                <div class="alert alert-info border-0 rounded-4 shadow-sm small mb-4">
                    <strong>Format CSV Wajib:</strong><br>
                    Kolom 1: NISN/NIP<br>
                    Kolom 2: Nama Lengkap<br>
                    Kolom 3: Kelas/Jabatan<br>
                    Kolom 4: Username<br>
                    <i>(Tanpa Header/Judul kolom di baris pertama juga boleh)</i>
                </div>

                <form action="{{ route('dpt.import') }}" method="POST" enctype="multipart/form-data" class="mt-auto">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label fw-semibold ps-1">Pilih File (.csv)</label>
                        <input type="file" name="file_csv" class="form-control form-control-glass p-3 @error('file_csv') is-invalid @enderror" accept=".csv" required>
                    </div>
                    <button type="submit" class="btn btn-success rounded-pill w-100 py-2 fw-bold shadow-sm">
                        <i class="bi bi-cloud-arrow-up-fill me-1"></i> Mulai Import
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection