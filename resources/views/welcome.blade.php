<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Voting Pemilihan Ketua OSIS</title>
    <!-- Google Fonts & Bootstrap Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .glass-card {
            background: rgba(255, 255, 255, 0.6); 
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 24px; 
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }
        .hero-section { padding: 80px 0 50px 0; }
    </style>
</head>
<body>

    <!-- NAVBAR PUBLIK -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background: rgba(255,255,255,0.7); backdrop-filter: blur(15px); border-bottom: 1px solid rgba(255,255,255,0.5);">
        <div class="container">
            <a class="navbar-brand fw-bold text-dark fs-4" href="#">
                <i class="bi bi-box-fill text-primary me-1"></i> E-Voting OSIS
            </a>
            <div class="ms-auto d-flex gap-2">
                <a href="{{ route('live.quickcount') }}" class="btn btn-outline-primary rounded-pill px-4 fw-bold" target="_blank">
                    <i class="bi bi-bar-chart-fill me-1"></i> Quick Count
                </a>
                <a href="{{ route('bilik.login') }}" class="btn btn-primary rounded-pill px-4 fw-bold" style="background: #007aff; border: none;">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Masuk Bilik
                </a>
                <a href="{{ route('login') }}" class="btn btn-outline-primary rounded-pill px-4 fw-bold" target="_blank">
                    <i class="bi bi-person-fill"></i> Admin
                </a>
            </div>
        </div>
    </nav>

    <div class="container hero-section" style="margin-top: 80px;">
        
        <!-- HERO BANNER -->
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold mb-3">
                    <i class="bi bi-megaphone-fill me-1"></i> Pemilihan Raya Demokrasi Sekolah
                </span>
                <!-- Mengambil data judul dari database -->
                <h1 class="fw-bold display-4 text-dark mb-3">{{ $setting->sambutan_judul ?? 'Suara Anda Menentukan Masa Depan Sekolah.' }}</h1>
                <!-- Mengambil data deskripsi dari database -->
                <p class="text-muted fs-5 mb-4">{{ $setting->sambutan_deskripsi ?? 'Selamat datang di portal resmi pemilihan Ketua dan Wakil Ketua OSIS berbasis digital.' }}</p>
                <div class="d-flex gap-3">
                    <a href="{{ route('bilik.login') }}" class="btn btn-primary btn-lg rounded-pill px-5 fw-bold shadow" style="background: #007aff; border: none;">
                        Mulai Memilih <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                    <a href="{{ route('live.quickcount') }}" class="btn btn-light btn-lg rounded-pill px-4 fw-bold border shadow-sm text-dark" target="_blank">
                        Lihat Quick Count
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="glass-card p-5">
                    <i class="bi bi-shield-check text-success" style="font-size: 7rem;"></i>
                    <h3 class="fw-bold text-dark mt-3">Sistem Terenkripsi & Aman</h3>
                    <p class="text-muted small mb-0">Setiap token pemilih hanya dapat digunakan satu kali untuk menjaga kemurnian hasil pemilu.</p>
                </div>
            </div>
        </div>

        <!-- SECTION: CARA MENGGUNAKAN SISTEM (TUTORIAL) -->
        <div class="row mb-5">
            <div class="col-12 text-center mb-4">
                <h2 class="fw-bold text-dark">Tata Cara Pemilihan</h2>
                <p class="text-muted">Ikuti 3 langkah mudah berikut di bilik suara.</p>
            </div>
            <div class="col-md-4 mb-3">
                <div class="glass-card p-4 h-100 text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex justify-content-center align-items-center fs-3 mb-3 shadow" style="width: 60px; height: 60px;">1</div>
                    <h5 class="fw-bold text-dark">Ambil Kartu Akses</h5>
                    <p class="text-muted small">Dapatkan kartu akses token unik rahasia yang dibagikan oleh panitia pemilihan osis.</p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="glass-card p-4 h-100 text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex justify-content-center align-items-center fs-3 mb-3 shadow" style="width: 60px; height: 60px;">2</div>
                    <h5 class="fw-bold text-dark">Login & Pilih</h5>
                    <p class="text-muted small">Masukkan Username dan Token ke bilik suara, lalu pelajari visi misi kandidat.</p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="glass-card p-4 h-100 text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex justify-content-center align-items-center fs-3 mb-3 shadow" style="width: 60px; height: 60px;">3</div>
                    <h5 class="fw-bold text-dark">Selesai & Sembunyikan</h5>
                    <p class="text-muted small">Tekan tombol coblos. Sistem akan otomatis merekam suara dan mengeluarkan sesi Anda.</p>
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <footer class="text-center py-4 text-muted small border-top border-light">
            <p class="mb-0">&copy; {{ date('Y') }} E-Voting OSIS Digital. All rights reserved.</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>