@extends('layouts.app')

@section('content')
<div class="container py-2">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-0">Data Pemilih (DPT)</h2>
            <p class="text-muted">Kelola daftar siswa yang berhak memberikan suara.</p>
        </div>
        <div>
            <!-- Tombol Refresh Token -->
            <form id="form-refresh-token" action="{{ route('dpt.refresh_tokens') }}" method="POST" class="d-inline">
                @csrf
                <button type="button" class="btn btn-warning rounded-pill px-3 py-2 shadow-sm fw-bold border-0 me-2" onclick="confirmRefreshToken()">
                    <i class="bi bi-arrow-clockwise me-1"></i> Refresh Token
                </button>
            </form>

            <a href="{{ route('dpt.create') }}" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm fw-bold border-0" style="background: #007aff;">
                <i class="bi bi-plus-lg me-1"></i> Tambah / Import
            </a>
        </div>
    </div>

    <!-- Kotak Info Ringkas (Tetap Sama) -->
    <!-- ... (Baris info ringkas biarkan atau salin yang sebelumnya, tidak ada perubahan) ... -->

    <!-- FORM UNTUK CETAK/HAPUS MASSAL -->
    <form id="bulk-form" method="POST">
        @csrf
        
        <!-- Menu Aksi Massal (Akan aktif digunakan bersama form) -->
        <div class="mb-3 d-flex gap-2">
            <button type="button" class="btn btn-danger btn-sm rounded-pill px-4 fw-bold shadow-sm" onclick="submitBulk('cetak')">
                <i class="bi bi-printer-fill me-1"></i> Cetak Tiket Terpilih
            </button>
            <button type="button" class="btn btn-outline-danger btn-sm rounded-pill px-4 fw-bold bg-white shadow-sm" onclick="submitBulk('hapus')">
                <i class="bi bi-trash-fill me-1"></i> Hapus Terpilih
            </button>
            <small class="text-muted ms-2 align-self-center"><i class="bi bi-info-circle me-1"></i>Centang kotak di bawah lalu pilih aksi.</small>
        </div>

        <div class="glass-card p-4">
            <div class="table-responsive">
                <table class="table table-borderless align-middle mb-0">
                    <thead class="border-bottom border-light">
                        <tr class="text-muted">
                            <!-- CHECKBOX SELECT ALL -->
                            <th width="5%" class="text-center">
                                <input class="form-check-input shadow-sm" type="checkbox" id="checkAll" onclick="toggleSelectAll(this)">
                            </th>
                            <th>Peserta / NISN</th>
                            <th>Kelas</th>
                            <th class="text-center">Token</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dpts as $dpt)
                        <tr class="border-bottom border-light">
                            <td class="text-center">
                                <!-- CHECKBOX SATUAN -->
                                <input class="form-check-input dpt-checkbox shadow-sm" type="checkbox" name="ids[]" value="{{ $dpt->id }}">
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $dpt->nama }}</div>
                                <div class="text-muted small">NISN: {{ $dpt->nisn }} | User: {{ $dpt->username }}</div>
                            </td>
                            <td><span class="badge bg-light text-dark border">{{ $dpt->kelas }}</span></td>
                            <td class="text-center">
                                <span class="badge rounded-pill fw-bold" style="background: rgba(0,122,255,0.1); color: #007aff; font-family: monospace; letter-spacing: 2px;">
                                    {{ $dpt->token }}
                                </span>
                            </td>
                            <td class="text-center">
                                @if($dpt->status_pilih == 1)
                                    <span class="badge bg-success rounded-pill px-2 py-1"><i class="bi bi-check"></i> Sudah</span>
                                @else
                                    <span class="badge bg-danger rounded-pill px-2 py-1"><i class="bi bi-x"></i> Belum</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">Belum ada data.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    // Fitur Select All (Pilih Semua)
    function toggleSelectAll(source) {
        let checkboxes = document.querySelectorAll('.dpt-checkbox');
        for(let i=0; i<checkboxes.length; i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    // Fitur Submit Aksi Massal (Cetak / Hapus)
    function submitBulk(action) {
        const form = document.getElementById('bulk-form');
        let totalChecked = document.querySelectorAll('.dpt-checkbox:checked').length;
        
        if (action === 'cetak') {
            if(totalChecked === 0) {
                // Jika tidak ada yang diceklis, konfirmasi apakah cetak SEMUA
                Swal.fire({
                    title: 'Cetak Semua Tiket?',
                    text: 'Anda tidak menyeleksi data apa pun. Apakah Anda ingin mencetak seluruh tiket DPT?',
                    icon: 'question', showCancelButton: true, confirmButtonText: 'Ya, Cetak Semua', customClass: { popup: 'swal2-glass' }
                }).then((res) => {
                    if(res.isConfirmed) {
                        form.action = "{{ route('dpt.cetak_tiket') }}";
                        form.target = "_blank"; // Buka tab baru untuk PDF Preview
                        form.submit();
                    }
                });
            } else {
                // Cetak terpilih
                form.action = "{{ route('dpt.cetak_tiket') }}";
                form.target = "_blank"; // Buka tab baru
                form.submit();
            }
        } 
        
        else if (action === 'hapus') {
            if(totalChecked === 0) {
                Swal.fire({ icon: 'error', title: 'Oops...', text: 'Pilih minimal satu data untuk dihapus!', customClass: { popup: 'swal2-glass' } });
            } else {
                Swal.fire({
                    title: 'Hapus ' + totalChecked + ' Data Terpilih?',
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: 'warning', showCancelButton: true, confirmButtonColor: '#ff3b30', confirmButtonText: 'Ya, Hapus!', customClass: { popup: 'swal2-glass' }
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.action = "{{ route('dpt.hapus_massal') }}";
                        form.target = "_self"; // Jangan buka tab baru
                        form.submit();
                    }
                })
            }
        }
    }

    // Modal Refresh Token (Tetap sama)
    function confirmRefreshToken() {
        Swal.fire({
            title: 'Refresh Semua Token?',
            icon: 'info', showCancelButton: true, confirmButtonText: 'Ya, Refresh!', customClass: { popup: 'swal2-glass' }
        }).then((result) => {
            if (result.isConfirmed) document.getElementById('form-refresh-token').submit();
        });
    }
</script>
@endpush