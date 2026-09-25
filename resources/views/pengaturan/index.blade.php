@extends('layouts.app')
@section('content')
<div class="container py-2">
    <h2 class="fw-bold text-dark mb-4"><i class="bi bi-gear-fill text-primary me-2"></i>Pengaturan Laporan (PDF)</h2>
    
    <div class="glass-card p-4">
        <form action="{{ route('pengaturan.update') }}" method="POST">
            @csrf
            <h5 class="fw-bold mb-3 border-bottom pb-2">Identitas Sekolah (Kop Surat)</h5>
            <div class="row mb-4">
                <div class="col-md-12 mb-3">
                    <label class="form-label">Nama Institusi/Sekolah</label>
                    <input type="text" name="nama_sekolah" class="form-control" value="{{ $setting->nama_sekolah }}" placeholder="Cth: SMA NEGERI 1 BOGOR">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Alamat Lengkap</label>
                    <input type="text" name="alamat" class="form-control" value="{{ $setting->alamat }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kontak (Email / Telp)</label>
                    <input type="text" name="kontak" class="form-control" value="{{ $setting->kontak }}">
                </div>
            </div>

            <h5 class="fw-bold mb-3 border-bottom pb-2">Penandatangan Laporan</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Kepala Sekolah</label>
                    <input type="text" name="nama_kepsek" class="form-control" value="{{ $setting->nama_kepsek }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">NIP Kepala Sekolah</label>
                    <input type="text" name="nip_kepsek" class="form-control" value="{{ $setting->nip_kepsek }}">
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Pembina OSIS</label>
                    <input type="text" name="nama_pembina" class="form-control" value="{{ $setting->nama_pembina }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">NIP Pembina OSIS</label>
                    <input type="text" name="nip_pembina" class="form-control" value="{{ $setting->nip_pembina }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Ketua Panitia</label>
                    <input type="text" name="nama_ketua" class="form-control" value="{{ $setting->nama_ketua }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">NISN Ketua Panitia</label>
                    <input type="text" name="nisn_ketua" class="form-control" value="{{ $setting->nisn_ketua }}">
                </div>
            </div>
            <!-- TAMBAHAN INPUT KONTEN DINAMIS -->
            <h5 class="fw-bold mb-3 border-bottom pb-2 mt-5">Konten Halaman Utama (Landing Page)</h5>
            <div class="row mb-4">
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold">Judul Utama (Headline)</label>
                    <input type="text" name="sambutan_judul" class="form-control" value="{{ $setting->sambutan_judul ?? 'Suara Anda Menentukan Masa Depan Sekolah.' }}">
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold">Deskripsi Sambutan</label>
                    <textarea name="sambutan_deskripsi" class="form-control" rows="3">{{ $setting->sambutan_deskripsi ?? 'Selamat datang di portal resmi pemilihan Ketua dan Wakil Ketua OSIS berbasis digital.' }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3 px-5 fw-bold rounded-pill">Simpan Pengaturan</button>
        </form>
    </div>
</div>
@endsection