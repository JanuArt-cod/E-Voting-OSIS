<?php

use App\Http\Controllers\DptController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\PaslonController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\RoleAccess; // <-- 1. IMPORT MIDDLEWARE DI SINI
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index']);

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

// 2. TAMBAHKAN RoleAccess::class DI DALAM ARRAY MIDDLEWARE
Route::middleware(['auth', RoleAccess::class])->group(function () {
    
    // Semua rute di dalam sini sekarang dijaga oleh Satpam "RoleAccess"
    Route::resource('paslon', PaslonController::class);
    
    Route::post('/dpt/import', [DptController::class, 'importCsv'])->name('dpt.import');
    Route::get('/dpt/export', [DptController::class, 'exportCsv'])->name('dpt.export'); // <-- KODE BARU
    // --- RUTE POST UNTUK AKSI MASSAL ---
    Route::post('/dpt/cetak-tiket', [DptController::class, 'cetakTiket'])->name('dpt.cetak_tiket');
    Route::post('/dpt/hapus-massal', [DptController::class, 'hapusMassal'])->name('dpt.hapus_massal');
    Route::post('/dpt/refresh-tokens', [DptController::class, 'refreshSemuaToken'])->name('dpt.refresh_tokens');
    Route::resource('dpt', DptController::class);
    
    
    Route::resource('panitia', PanitiaController::class);

    // --- KODE BARU: Route Laporan (Hanya SuperAdmin) ---
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/cetak', [LaporanController::class, 'cetakPdf'])->name('laporan.cetak');

    Route::get('/pengaturan', [SettingController::class, 'index'])->name('pengaturan.index');
    Route::post('/pengaturan/update', [SettingController::class, 'update'])->name('pengaturan.update');
});
// --- RUTE KHUSUS BILIK SUARA (SISWA / DPT) ---
    Route::get('/bilik', [VotingController::class, 'loginForm'])->name('bilik.login');
    Route::post('/bilik/login', [VotingController::class, 'authenticate'])->name('bilik.authenticate');
    Route::get('/bilik/suara', [VotingController::class, 'suara'])->name('bilik.suara');
    Route::post('/bilik/vote/{paslon_id}', [VotingController::class, 'vote'])->name('bilik.vote');

    Route::get('/live-quick-count', [VotingController::class, 'liveQuickCount'])->name('live.quickcount');