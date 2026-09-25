<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- PWA Manifest & Meta -->
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#007aff">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'E-Voting OSIS') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background-color: #fdfbfb;
            background-image: 
                radial-gradient(at 0% 0%, #d4e4fb 0px, transparent 50%),
                radial-gradient(at 100% 0%, #ffdfd4 0px, transparent 50%),
                radial-gradient(at 100% 100%, #d4fbe1 0px, transparent 50%),
                radial-gradient(at 0% 100%, #e0c3fc 0px, transparent 50%);
            background-attachment: fixed;
            min-height: 100vh;
        }

        .navbar-glass {
            background: rgba(255, 255, 255, 0.45) !important; 
            backdrop-filter: blur(20px); 
            -webkit-backdrop-filter: blur(20px); 
            border-bottom: 1px solid rgba(255, 255, 255, 0.5); 
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05); 
            position: sticky;
            top: 0;
            z-index: 1000;
            padding-top: 15px !important;
            padding-bottom: 15px !important;
        }
        
        .navbar-nav .nav-item { margin-right: 15px; }
        .main-content { margin-top: 30px; padding-bottom: 50px; }

        .glass-card {
            background: rgba(255, 255, 255, 0.5); 
            backdrop-filter: blur(16px) saturate(180%);
            -webkit-backdrop-filter: blur(16px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 28px; 
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
            transition: transform 0.3s ease;
        }

        /* CUSTOM SWEETALERT2: Efek Kaca iOS */
        .swal2-popup.swal2-glass {
            background: rgba(255, 255, 255, 0.75) !important;
            backdrop-filter: blur(20px) !important;
            -webkit-backdrop-filter: blur(20px) !important;
            border: 1px solid rgba(255, 255, 255, 0.8) !important;
            border-radius: 24px !important;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1) !important;
        }
        .swal2-backdrop-show {
            background: rgba(0, 0, 0, 0.2) !important; /* Latar belakang lebih terang */
            backdrop-filter: blur(5px);
        }
    </style>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        @if(!request()->is('login') && !request()->is('bilik*'))
        <nav class="navbar navbar-expand-lg navbar-light navbar-glass">
            <div class="container">
                <a class="navbar-brand fw-bold text-dark fs-4" href="{{ url('/') }}">
                    <i class="bi bi-box-fill text-primary me-1"></i> E-Voting OSIS
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto ms-lg-5 mt-3 mt-lg-0">
                        @auth
                            @php
                                $user = Auth::user();
                                $isSuperAdmin = $user->role === 'superadmin';
                                // Mencegah error jika menu_access kosong
                                $menus = is_array($user->menu_access) ? $user->menu_access : [];
                            @endphp

                            <!-- SEMUA BISA LIHAT DASHBOARD -->
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('home') ? 'active fw-bold text-dark' : 'text-muted' }}" href="{{ route('home') }}">Dashboard</a>
                            </li>
                            
                            <!-- DATA PASLON (Hanya SuperAdmin ATAU jika diceklis) -->
                            @if($isSuperAdmin || in_array('paslon', $menus))
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('paslon*') ? 'active fw-bold text-dark' : 'text-muted' }}" href="{{ route('paslon.index') }}">Data Paslon</a>
                            </li>
                            @endif

                            <!-- DATA DPT (Hanya SuperAdmin ATAU jika diceklis) -->
                            @if($isSuperAdmin || in_array('dpt', $menus))
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('dpt*') ? 'active fw-bold text-dark' : 'text-muted' }}" href="{{ route('dpt.index') }}">Data DPT</a>
                            </li>
                            @endif

                            <!-- MENU INI MUTLAK HANYA UNTUK SUPER ADMIN -->
                            @if($isSuperAdmin)
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('panitia*') ? 'active fw-bold text-dark' : 'text-muted' }}" href="{{ route('panitia.index') }}">Panitia</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('laporan*') ? 'active fw-bold text-dark' : 'text-muted' }}" href="{{ route('laporan.index') }}">Hasil Voting</a>
                            </li>
                            <!-- MENU PENGATURAN KOP SURAT (DITAMBAHKAN DI SINI) -->
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('pengaturan*') ? 'active fw-bold text-dark' : 'text-muted' }}" href="{{ route('pengaturan.index') }}">Pengaturan</a>
                            </li>
                            @endif
                        @endauth
                    </ul>

                    <ul class="navbar-nav ms-auto mt-3 mt-lg-0">
                        @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle fw-bold text-dark d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random" class="rounded-circle me-2" width="32" height="32" alt="Avatar">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end shadow border-0 mt-2 rounded-4 p-2">
                                    <a class="dropdown-item text-danger rounded-3 py-2 fw-bold" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right me-2"></i> Keluar
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                                </div>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        @endif

        <main class="{{ request()->is('login') ? '' : 'main-content' }}">
            @yield('content')
        </main>
    </div>

    <!-- Script SweetAlert2 dari CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Script khusus untuk menangkap alert dari halaman turunan -->
    @stack('scripts')

<!-- Script SweetAlert2 dari CDN (Biarkan jika sudah ada) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- KODE BARU: Global Toast Notification -->
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3500,
            timerProgressBar: true,
            customClass: { popup: 'swal2-glass' }
        });

        // Menangkap Session Success
        @if(session('success'))
            Toast.fire({ icon: 'success', title: "{{ session('success') }}" });
        @endif

        // Menangkap Session Error (Termasuk dari Middleware)
        @if(session('error'))
            Toast.fire({ icon: 'error', title: "{{ session('error') }}" });
        @endif
    </script>

    @stack('scripts')
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then(reg => console.log('Service Worker terdaftar!', reg))
                    .catch(err => console.log('Service Worker gagal:', err));
            });
        }
    </script>
</body>
</html>