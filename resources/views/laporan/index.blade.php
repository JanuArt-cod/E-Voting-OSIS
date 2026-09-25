@extends('layouts.app')

@section('content')
<div class="container py-2">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-0">Rekapitulasi Hasil Voting</h2>
            <p class="text-muted">Hasil akhir perolehan suara pemilihan Ketua OSIS.</p>
        </div>
        <a href="{{ route('laporan.cetak') }}" class="btn btn-danger rounded-pill px-4 py-2 shadow-sm fw-bold border-0">
            <i class="bi bi-file-earmark-pdf-fill me-1"></i> Cetak Laporan PDF
        </a>
    </div>

    <!-- Kotak Pengumuman Pemenang -->
    @if($suara_masuk > 0)
    <div class="glass-card p-4 mb-4 text-center" style="background: linear-gradient(135deg, rgba(52, 199, 89, 0.1), rgba(147, 223, 165, 0.1)); border: 2px solid #34c759;">
        <h5 class="text-success fw-bold mb-2"><i class="bi bi-trophy-fill me-2"></i>KANDIDAT TERPILIH SEMENTARA</h5>
        <h2 class="fw-bold text-dark mb-0">{{ $pemenang->nama_ketua }} & {{ $pemenang->nama_wakil }}</h2>
        <p class="text-muted mt-2 mb-0">Memimpin dengan <span class="fw-bold">{{ $pemenang->total_suara }} suara</span>.</p>
    </div>
    @endif

    <div class="row">
        <!-- Kolom Data Statistik -->
        <div class="col-md-4 mb-4">
            <div class="glass-card p-4 h-100">
                <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">Data Pemilih</h5>
                <ul class="list-group list-group-flush bg-transparent">
                    <li class="list-group-item bg-transparent d-flex justify-content-between align-items-center px-0">
                        <span class="text-muted fw-semibold">Total DPT</span>
                        <span class="badge bg-primary rounded-pill fs-6">{{ $total_dpt }}</span>
                    </li>
                    <li class="list-group-item bg-transparent d-flex justify-content-between align-items-center px-0">
                        <span class="text-muted fw-semibold">Suara Sah Masuk</span>
                        <span class="badge bg-success rounded-pill fs-6">{{ $suara_masuk }}</span>
                    </li>
                    <li class="list-group-item bg-transparent d-flex justify-content-between align-items-center px-0 border-0">
                        <span class="text-muted fw-semibold">Tidak Memilih (Golput)</span>
                        <span class="badge bg-danger rounded-pill fs-6">{{ $golput }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Kolom Detail Suara Paslon -->
        <div class="col-md-8 mb-4">
            <div class="glass-card p-4 h-100">
                <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">Rincian Suara per Paslon</h5>
                <div class="table-responsive">
                    <table class="table table-borderless align-middle">
                        <tbody>
                            @foreach($paslons as $p)
                            <tr class="border-bottom border-light">
                                <td width="10%">
                                    <div class="bg-primary text-white fw-bold rounded-circle d-flex justify-content-center align-items-center" style="width: 40px; height: 40px;">{{ $p->nomor_urut }}</div>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark fs-5">{{ $p->nama_ketua }}</div>
                                    <div class="text-muted small">Wakil: {{ $p->nama_wakil }}</div>
                                </td>
                                <td class="text-end" width="30%">
                                    <h4 class="fw-bold text-primary mb-0">{{ $p->total_suara }} <span class="fs-6 text-muted">Suara</span></h4>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection