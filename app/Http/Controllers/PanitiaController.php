<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PanitiaController extends Controller
{
    public function index()
    {
        // Menampilkan semua panitia, diurutkan berdasarkan role (superadmin di atas)
        $panitias = User::orderBy('role', 'asc')->orderBy('name', 'asc')->get();
        return view('panitia.index', compact('panitias'));
    }

    public function create()
    {
        return view('panitia.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:6',
            'role' => 'required|in:superadmin,operator',
            'menu_access' => 'nullable|array', // Validasi array checkbox
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'role' => $request->role,
            // Jika dia superadmin berikan akses null/semua, jika operator simpan yang diceklis
            'menu_access' => $request->role == 'superadmin' ? null : $request->menu_access,
        ]);

        return redirect()->route('panitia.index')->with('success', 'Akun Panitia berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $panitia = User::findOrFail($id);
        return view('panitia.edit', compact('panitia'));
    }

    public function update(Request $request, string $id)
    {
        $panitia = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username,' . $id,
            'role' => 'required|in:superadmin,operator',
            'password' => 'nullable|string|min:6',
            'menu_access' => 'nullable|array', // Validasi array checkbox
        ]);

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
            'menu_access' => $request->role == 'superadmin' ? null : $request->menu_access,
        ];

        if ($request->filled('password')) {
            $data['password'] = \Illuminate\Support\Facades\Hash::make($request->password);
        }

        $panitia->update($data);
        return redirect()->route('panitia.index')->with('success', 'Data Panitia berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $panitia = User::findOrFail($id);

        // Mencegah user menghapus akunnya sendiri yang sedang dipakai login
        if ($panitia->id == Auth::id()) {
            return redirect()->route('panitia.index')->with('error', 'Gagal! Anda tidak bisa menghapus akun Anda sendiri.');
        }

        $panitia->delete();
        return redirect()->route('panitia.index')->with('success', 'Akun Panitia berhasil dihapus!');
    }

    public function show(string $id) {}
}