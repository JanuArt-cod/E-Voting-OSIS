<?php

namespace App\Http\Controllers;

use App\Models\Dpt;
use App\Models\Paslon;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VotingController extends Controller
{
    // 1. Menampilkan Halaman Login Khusus Siswa
    public function loginForm()
    {
        // Jika siswa sudah punya sesi login, langsung arahkan ke bilik suara
        if (Session::has('voter_id')) {
            return redirect()->route('bilik.suara');
        }
        return view('bilik.login');
    }

    // 2. Memproses Login Siswa
    public function authenticate(Request $request)
    {
        // 1. Pastikan kolom tidak kosong
        if (!$request->username || !$request->token) {
            return back()->with('error', 'Username dan Token wajib diisi!');
        }

        // 2. Paksa token menjadi huruf besar (Uppercase)
        $tokenInput = strtoupper($request->token);

        // 3. Cari data pemilih (DPT)
        $dpt = \App\Models\Dpt::where('username', $request->username)
                  ->where('token', $tokenInput)
                  ->first();

        // Jika data tidak ditemukan
        if (!$dpt) {
            return back()->with('error', 'Username atau Token salah!');
        }

        // Jika data ditemukan, tapi dia SUDAH MEMILIH
        if ($dpt->status_pilih == 1) {
            return back()->with('error', 'Akses Ditolak! Anda sudah mencoblos.');
        }

        // 4. Lolos! Buat Session untuk masuk ke Bilik
        \Illuminate\Support\Facades\Session::put('voter_id', $dpt->id);
        \Illuminate\Support\Facades\Session::put('voter_name', $dpt->nama);

        // Langsung arahkan ke halaman kartu paslon
        return redirect()->route('bilik.suara');
    }

    // 3. Menampilkan halaman kartu paslon
    public function suara()
    {
        // Pastikan hanya siswa yang punya sesi login yang bisa masuk sini
        if (!Session::has('voter_id')) {
            return redirect()->route('bilik.login')->with('error', 'Sesi berakhir. Silakan login kembali.');
        }

        // Ambil data paslon, urutkan berdasarkan nomor urut
        $paslons = Paslon::orderBy('nomor_urut', 'asc')->get();
        return view('bilik.suara', compact('paslons'));
    }

    // 4. Memproses penyimpanan suara
    public function vote(Request $request, $paslon_id)
    {
        // Cek keamanan sesi
        if (!Session::has('voter_id')) {
            return redirect()->route('bilik.login')->with('error', 'Sesi tidak valid!');
        }

        $voter_id = Session::get('voter_id');

        // Cek silang ke database: Pastikan DPT ini BENAR-BENAR belum memilih
        $dpt = Dpt::find($voter_id);
        if (!$dpt || $dpt->status_pilih == 1) {
            Session::flush(); // Hapus sesi curang
            return redirect()->route('bilik.login')->with('error', 'Akses Ditolak! Anda sudah menggunakan hak suara sebelumnya.');
        }

        // 1. Simpan suara ke tabel votes (anonim, hanya simpan ID Paslon)
        Vote::create([
            'paslon_id' => $paslon_id
        ]);

        // 2. Ubah status_pilih siswa menjadi 1 (Sudah memilih)
        $dpt->update([
            'status_pilih' => 1
        ]);

        // 3. Hapus sesi (Logout otomatis agar bisa dipakai siswa berikutnya)
        Session::flush();

        // 4. Kembalikan ke halaman login dengan pesan sukses besar
        return redirect()->route('bilik.login')->with('success', 'Terima kasih! Suara Anda telah berhasil direkam ke dalam kotak suara digital.');
    }

    // Menampilkan Layar Live Quick Count Publik
    public function liveQuickCount()
    {
        $total_paslon = Paslon::count();
        $total_dpt = Dpt::count();
        $suara_masuk = Vote::count();
        $paslons = Paslon::orderBy('nomor_urut', 'asc')->get();
        
        $chartLabels = []; $chartData = []; $chartColors = [];
        $colors = ['rgba(0, 122, 255, 0.85)', 'rgba(52, 199, 89, 0.85)', 'rgba(255, 149, 0, 0.85)', 'rgba(175, 82, 222, 0.85)'];

        foreach ($paslons as $index => $paslon) {
            $chartLabels[] = "No." . $paslon->nomor_urut . " - " . $paslon->nama_ketua;
            $chartData[] = Vote::where('paslon_id', $paslon->id)->count();
            $chartColors[] = $colors[$index % count($colors)];
        }

        return view('bilik.live', compact('total_paslon', 'total_dpt', 'suara_masuk', 'chartLabels', 'chartData', 'chartColors'));
    }
}