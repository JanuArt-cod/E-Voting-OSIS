@extends('layouts.app')

@section('content')
<div class="container py-2">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-0">Manajemen Paslon</h2>
            <p class="text-muted">Kelola data peserta kandidat ketua OSIS.</p>
        </div>
        <a href="{{ route('paslon.create') }}" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm fw-bold border-0" style="background: #007aff;">
            <i class="bi bi-plus-lg me-1"></i> Tambah Kandidat
        </a>
    </div>

    <div class="glass-card p-4">
        <div class="table-responsive">
            <table class="table table-borderless align-middle mb-0">
                <thead class="border-bottom border-light">
                    <tr class="text-muted">
                        <th width="8%" class="text-center">No. Urut</th>
                        <th>Kandidat</th>
                        <th width="40%">Visi & Misi</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($paslons as $p)
                    <tr class="border-bottom border-light">
                        <td class="text-center">
                            <div class="text-white fw-bold rounded-circle d-inline-flex justify-content-center align-items-center shadow-sm" style="background: linear-gradient(135deg, #007aff, #00c6ff); width: 45px; height: 45px; font-size: 1.3rem;">
                                {{ $p->nomor_urut }}
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold text-dark fs-5">{{ $p->nama_ketua }}</div>
                            <div class="text-muted small">Wakil: <span class="fw-semibold">{{ $p->nama_wakil }}</span></div>
                        </td>
                        <td>
                            <div class="small mb-1"><strong class="text-dark">Visi:</strong> <span class="text-muted">{{ \Illuminate\Support\Str::limit($p->visi, 50) }}</span></div>
                            <div class="small"><strong class="text-dark">Misi:</strong> <span class="text-muted">{{ \Illuminate\Support\Str::limit($p->misi, 50) }}</span></div>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('paslon.edit', $p->id) }}" class="btn btn-sm btn-light text-primary rounded-pill shadow-sm px-3 mb-1 fw-semibold">
                                Edit
                            </a>
                            
                            <!-- Tombol Hapus memanggil fungsi JavaScript confirmDelete -->
                            <form id="delete-form-{{ $p->id }}" action="{{ route('paslon.destroy', $p->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-light text-danger rounded-pill shadow-sm px-3 mb-1 fw-semibold" onclick="confirmDelete({{ $p->id }}, {{ $p->nomor_urut }})">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                            Belum ada data Pasangan Calon.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // 1. Popup Sukses (Toast Alert) jika operasi CRUD berhasil
    @if(session('success'))
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 3000,
            customClass: { popup: 'swal2-glass' }
        });
    @endif

    // 2. Popup Modal Konfirmasi Hapus Bergaya iOS
    function confirmDelete(id, noUrut) {
        Swal.fire({
            title: 'Hapus Paslon ' + noUrut + '?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ff3b30', // Merah iOS
            cancelButtonColor: '#c7c7cc',  // Abu-abu iOS
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            customClass: { popup: 'swal2-glass' }
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form hapus jika user menekan "Ya"
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>
@endpush