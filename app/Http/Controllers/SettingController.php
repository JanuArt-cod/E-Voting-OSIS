<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        // Ambil data pertama, jika belum ada buat otomatis data kosong
        $setting = Setting::firstOrCreate(['id' => 1]);
        return view('pengaturan.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();
        $setting->update($request->all());
        return back()->with('success', 'Pengaturan Kop Surat & TTD berhasil disimpan!');
    }
}