@extends('layouts.app')

@section('content')
<div class="container py-2">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-0">Manajemen Panitia</h2>
            <p class="text-muted">Kelola akun Admin dan Operator bilik suara.</p>
        </div>
        <a href="{{ route('panitia.create') }}" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm fw-bold border-0" style="background: #007aff;">
            <i class="bi bi-person-plus-fill me-1"></i> Tambah Akun
        </a>
    </div>

    <div class="glass-card p-4">
        <div class="table-responsive">
            <table class="table table-borderless align-middle mb-0">
                <thead class="border-bottom border-light">
                    <tr class="text-muted">
                        <th>Nama Lengkap</th>
                        <th>Username Login</th>
                        <th>Hak Akses (Role)</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($panitias as $p)
                    <tr class="border-bottom border-light">
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="https://ui-avatars.com/api/?name={{ $p->name }}&background=random" class="rounded-circle me-3 shadow-sm" width="45" height="45">
                                <div>
                                    <div class="fw-bold text-dark fs-5">{{ $p->name }} 
                                        @if($p->id == Auth::id()) <span class="badge bg-success ms-1" style="font-size: 0.7rem;">Anda</span> @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-muted fw-semibold"><i class="bi bi-box-arrow-in-right me-1"></i>{{ $p->username }}</span>
                        </td>
                        <td>
                            @if($p->role == 'superadmin')
                                <span class="badge bg-primary rounded-pill px-3 py-2"><i class="bi bi-shield-lock-fill me-1"></i> Super Admin</span>
                            @else
                                <span class="badge bg-secondary rounded-pill px-3 py-2"><i class="bi bi-person-gear me-1"></i> Operator</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('panitia.edit', $p->id) }}" class="btn btn-sm btn-light text-primary rounded-pill shadow-sm mb-1 px-3 fw-semibold">Edit</a>
                            
                            @if($p->id != Auth::id())
                                <form id="delete-form-{{ $p->id }}" action="{{ route('panitia.destroy', $p->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-light text-danger rounded-pill shadow-sm mb-1 px-3 fw-semibold" onclick="confirmDeletePanitia({{ $p->id }}, '{{ $p->name }}')">Hapus</button>
                                </form>
                            @else
                                <button class="btn btn-sm btn-light text-muted rounded-pill shadow-sm mb-1 px-3 fw-semibold" disabled title="Tidak bisa menghapus akun sendiri">Hapus</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Notifikasi Sukses
    @if(session('success'))
        Swal.fire({ toast: true, position: 'top-end', icon: 'success', title: "{{ session('success') }}", showConfirmButton: false, timer: 3000, customClass: { popup: 'swal2-glass' } });
    @endif
    // Notifikasi Error (misal: hapus akun sendiri)
    @if(session('error'))
        Swal.fire({ toast: true, position: 'top-end', icon: 'error', title: "{{ session('error') }}", showConfirmButton: false, timer: 3000, customClass: { popup: 'swal2-glass' } });
    @endif

    function confirmDeletePanitia(id, name) {
        Swal.fire({
            title: 'Hapus akun ' + name + '?',
            text: "Pengguna ini tidak akan bisa login lagi!",
            icon: 'warning', showCancelButton: true,
            confirmButtonColor: '#ff3b30', cancelButtonColor: '#c7c7cc',
            confirmButtonText: 'Ya, Hapus!', cancelButtonText: 'Batal',
            customClass: { popup: 'swal2-glass' }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>
@endpush