@extends('layouts.app')

@section('content')
<div class="container py-4">
    
    <!-- Header Bilik Suara -->
    <div class="glass-card p-4 mb-5 text-center">
        <h2 class="fw-bold text-dark mb-1">Surat Suara Digital</h2>
        <p class="text-muted fs-5 mb-0">Selamat datang, <span class="fw-bold text-primary">{{ Session::get('voter_name') }}</span>. Silakan tentukan pilihan terbaik Anda.</p>
    </div>

    <!-- Grid Kartu Paslon -->
    <div class="row justify-content-center g-4">
        @foreach($paslons as $p)
        <div class="col-lg-5 col-md-6">
            <div class="glass-card h-100 d-flex flex-column overflow-hidden position-relative" style="border: 2px solid rgba(255,255,255,0.8);">
                
                <!-- Lencana Nomor Urut -->
                <div class="position-absolute top-0 start-0 m-3 z-3">
                    <span class="badge rounded-circle shadow-lg d-flex justify-content-center align-items-center" style="width: 50px; height: 50px; font-size: 1.5rem; background: linear-gradient(135deg, #007aff, #00c6ff);">
                        {{ $p->nomor_urut }}
                    </span>
                </div>

                <!-- Foto Paslon -->
                <div class="w-100 bg-white d-flex justify-content-center align-items-center overflow-hidden" style="height: 250px;">
                    @if($p->foto)
                        <img src="{{ asset('storage/' . $p->foto) }}" alt="Foto Paslon {{ $p->nomor_urut }}" style="width: 100%; height: 100%; object-fit: cover;">
                    @else
                        <!-- Placeholder jika belum ada foto -->
                        <div class="text-center text-muted">
                            <i class="bi bi-person-bounding-box" style="font-size: 5rem; opacity: 0.2;"></i>
                            <p class="mt-2 small">Foto belum diunggah</p>
                        </div>
                    @endif
                </div>

                <!-- Identitas & Visi Misi -->
                <div class="p-4 flex-grow-1 d-flex flex-column">
                    <div class="text-center mb-4">
                        <h4 class="fw-bold text-dark mb-0">{{ $p->nama_ketua }}</h4>
                        <span class="text-muted small">&</span>
                        <h5 class="fw-bold text-dark mt-1">{{ $p->nama_wakil }}</h5>
                    </div>

                    <div class="mb-3">
                        <strong class="text-primary small text-uppercase">Visi:</strong>
                        <p class="text-dark small mb-0">{{ $p->visi }}</p>
                    </div>
                    
                    <div class="mb-4 flex-grow-1">
                        <strong class="text-primary small text-uppercase">Misi:</strong>
                        <p class="text-dark small mb-0">{!! nl2br(e($p->misi)) !!}</p>
                    </div>

                    <!-- Tombol Pilih -->
                    <form id="vote-form-{{ $p->id }}" action="{{ route('bilik.vote', $p->id) }}" method="POST" class="mt-auto">
                        @csrf
                        <button type="button" class="btn btn-primary rounded-pill w-100 py-3 fw-bold shadow-lg fs-5" style="background: linear-gradient(135deg, #007aff, #00c6ff); border: none;" onclick="confirmVote({{ $p->id }}, '{{ $p->nama_ketua }} & {{ $p->nama_wakil }}')">
                            <i class="bi bi-check2-circle me-2"></i> COBLOS PASLON {{ $p->nomor_urut }}
                        </button>
                    </form>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Popup Konfirmasi Sebelum Mencoblos
    function confirmVote(id, namaPaslon) {
        Swal.fire({
            title: 'Konfirmasi Pilihan',
            html: "Anda akan memberikan suara untuk:<br><b class='fs-4 text-primary mt-2 d-block'>" + namaPaslon + "</b>",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#007aff',
            cancelButtonColor: '#c7c7cc',
            confirmButtonText: 'Ya, Saya Yakin!',
            cancelButtonText: 'Batal',
            customClass: { popup: 'swal2-glass' },
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Tampilkan loading agar siswa tidak double-click
                Swal.fire({
                    title: 'Memproses Suara...',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    customClass: { popup: 'swal2-glass' },
                    willOpen: () => {
                        Swal.showLoading()
                    }
                });
                // Submit form
                document.getElementById('vote-form-' + id).submit();
            }
        })
    }
</script>
@endpush