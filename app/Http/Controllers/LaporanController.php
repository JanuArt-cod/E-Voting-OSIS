<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paslon;
use App\Models\Dpt;
use App\Models\Vote;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    // Menampilkan halaman UI Laporan di web
    public function index()
    {
        $total_dpt = Dpt::count();
        $suara_masuk = Vote::count();
        $golput = $total_dpt - $suara_masuk;

        // Ambil data paslon beserta jumlah perolehan suaranya
        $paslons = Paslon::orderBy('nomor_urut', 'asc')->get()->map(function($paslon) {
            $paslon->total_suara = Vote::where('paslon_id', $paslon->id)->count();
            return $paslon;
        });

        // Tentukan pemenang (paslon dengan suara terbanyak)
        $pemenang = $paslons->sortByDesc('total_suara')->first();

        return view('laporan.index', compact('total_dpt', 'suara_masuk', 'golput', 'paslons', 'pemenang'));
    }

    // Fungsi untuk men-generate dan mendownload PDF
    public function cetakPdf()
    {
        $total_dpt = Dpt::count();
        $suara_masuk = Vote::count();
        $golput = $total_dpt - $suara_masuk;
        $tanggal = \Carbon\Carbon::now()->translatedFormat('l, d F Y');
        $setting = \App\Models\Setting::first(); // <--- AMBIL SETTING

        $paslons = Paslon::orderBy('nomor_urut', 'asc')->get()->map(function($paslon) {
            $paslon->total_suara = Vote::where('paslon_id', $paslon->id)->count();
            return $paslon;
        });

        // Tambahkan $setting ke dalam compact()
        $pdf = Pdf::loadView('laporan.pdf', compact('total_dpt', 'suara_masuk', 'golput', 'paslons', 'tanggal', 'setting'));
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream('Laporan_Hasil_Voting.pdf'); // Stream untuk preview di browser
    }
}