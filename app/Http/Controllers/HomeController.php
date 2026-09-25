<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paslon;
use App\Models\Dpt;
use App\Models\Vote;

class HomeController extends Controller
{
    /**
     * Memastikan hanya yang sudah login yang bisa masuk
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan Dashboard Quick Count
     */
    public function index()
    {
        // 1. Menghitung data untuk Widget (Kotak Atas)
        $total_paslon = Paslon::count();
        $total_dpt = Dpt::count();
        $suara_masuk = Vote::count(); // Atau bisa Dpt::where('status_pilih', 1)->count()

        // 2. Mengambil data Paslon untuk sumbu X di grafik
        $paslons = Paslon::orderBy('nomor_urut', 'asc')->get();
        
        $chartLabels = [];
        $chartData = [];
        $chartColors = [];
        
        // Daftar warna gradien elegan untuk setiap batang grafik
        $colors = [
            'rgba(0, 122, 255, 0.85)', // Biru iOS
            'rgba(52, 199, 89, 0.85)', // Hijau iOS
            'rgba(255, 149, 0, 0.85)', // Oranye iOS
            'rgba(175, 82, 222, 0.85)',// Ungu iOS
        ];

        // 3. Menghitung perolehan suara masing-masing Paslon
        foreach ($paslons as $index => $paslon) {
            // Label nama paslon
            $chartLabels[] = "No." . $paslon->nomor_urut . " - " . $paslon->nama_ketua;
            
            // Hitung total suara (berapa kali paslon_id ini muncul di tabel votes)
            $chartData[] = Vote::where('paslon_id', $paslon->id)->count();
            
            // Ambil warna (jika paslon lebih dari 4, akan kembali ke warna awal)
            $chartColors[] = $colors[$index % count($colors)];
        }

        return view('home', compact(
            'total_paslon', 
            'total_dpt', 
            'suara_masuk', 
            'chartLabels', 
            'chartData',
            'chartColors'
        ));
    }
}