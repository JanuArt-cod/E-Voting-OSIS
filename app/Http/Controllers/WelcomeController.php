<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Paslon;

class WelcomeController extends Controller
{
    public function index()
    {
        // Ambil pengaturan umum (Kop surat, sambutan, tata cara)
        $setting = Setting::firstOrCreate(['id' => 1]);

        // Ambil juga data paslon untuk ditampilkan di Landing Page (opsional jika ingin profil paslon tampil dinamis)
        $paslons = Paslon::orderBy('nomor_urut', 'asc')->get();

        return view('welcome', compact('setting', 'paslons'));
    }
}