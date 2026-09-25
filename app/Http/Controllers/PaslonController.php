<?php

namespace App\Http\Controllers;

use App\Models\Paslon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaslonController extends Controller
{
    public function index()
    {
        $paslons = Paslon::orderBy('nomor_urut', 'asc')->get();
        return view('paslon.index', compact('paslons'));
    }

    public function create()
    {
        return view('paslon.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_urut' => 'required|integer|unique:paslons,nomor_urut',
            'nama_ketua' => 'required|string|max:255',
            'nama_wakil' => 'required|string|max:255',
            'visi'       => 'required',
            'misi'       => 'required',
            'foto'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_paslon', 'public');
        }

        Paslon::create($data);
        return redirect()->route('paslon.index')->with('success', 'Data Paslon berhasil ditambahkan!');
    }

    public function show(string $id) { }

    // --- KODE BARU: Menampilkan Form Edit ---
    public function edit(string $id)
    {
        $paslon = Paslon::findOrFail($id);
        return view('paslon.edit', compact('paslon'));
    }

    // --- KODE BARU: Memproses Update Data ke Database ---
    public function update(Request $request, string $id)
    {
        $paslon = Paslon::findOrFail($id);

        // Validasi: pastikan nomor_urut unik, TAPI abaikan ID milik paslon ini sendiri
        $request->validate([
            'nomor_urut' => 'required|integer|unique:paslons,nomor_urut,' . $id,
            'nama_ketua' => 'required|string|max:255',
            'nama_wakil' => 'required|string|max:255',
            'visi'       => 'required',
            'misi'       => 'required',
            'foto'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Jika panitia mengupload foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama dari storage (jika ada)
            if ($paslon->foto && Storage::disk('public')->exists($paslon->foto)) {
                Storage::disk('public')->delete($paslon->foto);
            }
            // Simpan foto baru
            $data['foto'] = $request->file('foto')->store('foto_paslon', 'public');
        }

        $paslon->update($data);
        return redirect()->route('paslon.index')->with('success', 'Data Paslon berhasil diperbarui!');
    }

    // --- KODE BARU: Menghapus Data dari Database ---
    public function destroy(string $id)
    {
        $paslon = Paslon::findOrFail($id);

        // Hapus foto dari server jika ada
        if ($paslon->foto && Storage::disk('public')->exists($paslon->foto)) {
            Storage::disk('public')->delete($paslon->foto);
        }

        // Hapus record dari database
        $paslon->delete();
        return redirect()->route('paslon.index')->with('success', 'Data Paslon berhasil dihapus!');
    }
}