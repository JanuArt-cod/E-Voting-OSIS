<?php

namespace App\Http\Controllers;

use App\Models\Dpt;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf; // <--- WAJIB TAMBAHKAN INI

class DptController extends Controller
{
    public function index()
    {
        $dpts = Dpt::orderBy('kelas', 'asc')->orderBy('nama', 'asc')->get();
        return view('dpt.index', compact('dpts'));
    }

    public function create()
    {
        return view('dpt.create'); 
    }

    // 1. Simpan Data DPT Manual (Satu per satu)
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|numeric|unique:dpts,nisn',
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:100',
            'username' => 'required|string|unique:dpts,username',
        ]);

        Dpt::create([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'username' => $request->username,
            'token' => strtoupper(Str::random(6)), // Generate token otomatis
            'status_pilih' => 0
        ]);

        return redirect()->route('dpt.index')->with('success', 'Data Pemilih berhasil ditambahkan!');
    }

    // 2. Import Data Massal dari CSV
    public function importCsv(Request $request)
    {
        $request->validate([
            'file_csv' => 'required|mimes:csv,txt|max:2048',
        ]);

        $file = $request->file('file_csv');
        $handle = fopen($file->getPathname(), "r");
        
        $header = true;
        while ($row = fgetcsv($handle, 1000, ",")) {
            // Lewati baris pertama jika itu adalah header (judul kolom)
            if ($header) { $header = false; continue; }
            
            // Format CSV yang diminta: NISN, Nama, Kelas, Username
            if(count($row) >= 4) {
                // Update jika NISN sudah ada, atau Buat Baru jika belum ada
                Dpt::updateOrCreate(
                    ['nisn' => $row[0]], 
                    [
                        'nama' => $row[1],
                        'kelas' => $row[2],
                        'username' => $row[3],
                        'token' => strtoupper(Str::random(6)),
                        'status_pilih' => 0
                    ]
                );
            }
        }
        fclose($handle);

        return redirect()->route('dpt.index')->with('success', 'Ratusan data berhasil di-import dari CSV!');
    }

    // 3. Refresh Semua Token (Bisa ditekan manual atau dipanggil Cron Job)
    public function refreshSemuaToken()
    {
        // Ambil semua DPT yang BELUM MEMILIH
        $dpts = Dpt::where('status_pilih', 0)->get();
        
        foreach($dpts as $dpt) {
            $dpt->update([
                'token' => strtoupper(Str::random(6))
            ]);
        }

        return redirect()->route('dpt.index')->with('success', 'Semua Token berhasil di-refresh dengan kode baru!');
    }

    // Tampilkan form Edit
    public function edit(string $id)
    {
        $dpt = Dpt::findOrFail($id);
        return view('dpt.edit', compact('dpt'));
    }

    // Update Data DPT
    public function update(Request $request, string $id)
    {
        $dpt = Dpt::findOrFail($id);
        $request->validate([
            'nisn' => 'required|numeric|unique:dpts,nisn,'.$id,
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:100',
            'username' => 'required|string|unique:dpts,username,'.$id,
        ]);

        $dpt->update($request->all());
        return redirect()->route('dpt.index')->with('success', 'Data Pemilih diperbarui!');
    }

    // Hapus Data DPT
    public function destroy(string $id)
    {
        $dpt = Dpt::findOrFail($id);
        $dpt->delete();
        return redirect()->route('dpt.index')->with('success', 'Data Pemilih dihapus!');
    }

    // Mencetak Tiket PDF (Hanya yang diceklis, atau semua jika tidak ada yang diceklis)
    public function cetakTiket(Request $request)
    {
        $query = Dpt::orderBy('kelas', 'asc')->orderBy('nama', 'asc');
        
        // PERBAIKAN: Memastikan array ids terdeteksi dengan benar dari form POST
        if ($request->has('ids') && is_array($request->ids) && count($request->ids) > 0) {
            $query->whereIn('id', $request->ids);
        }
        
        $dpts = $query->get();

        if($dpts->isEmpty()) {
            return back()->with('error', 'Tidak ada data untuk dicetak.');
        }
        
        $pdf = Pdf::loadView('dpt.tiket_pdf', compact('dpts'));
        $pdf->setPaper('A4', 'portrait');
        
        // Preview PDF di browser
        return $pdf->stream('Tiket_Akses_Bilik_Suara.pdf');
    }
    // Menghapus data massal berdasarkan Checkbox
    public function hapusMassal(Request $request)
    {
        if ($request->has('ids') && count($request->ids) > 0) {
            Dpt::whereIn('id', $request->ids)->delete();
            return back()->with('success', count($request->ids) . ' data pemilih berhasil dihapus.');
        }

        return back()->with('error', 'Anda belum memilih data yang akan dihapus!');
    }
}