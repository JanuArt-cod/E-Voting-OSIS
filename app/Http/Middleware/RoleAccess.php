<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleAccess
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // 1. Jika belum login, tendang ke halaman login
        if (!$user) {
            return redirect('login');
        }

        // 2. Super Admin memiliki jalur VVIP (Bebas akses ke semua rute)
        if ($user->role === 'superadmin') {
            return $next($request);
        }

        // 3. Pengecekan Akses Mutlak (Hanya Super Admin)
        // Jika Operator mencoba masuk ke rute panitia atau hasil, tolak!
        if ($request->is('panitia*') || $request->is('hasil*')) {
            return redirect()->route('home')->with('error', 'Akses Ditolak! Halaman tersebut khusus Super Admin.');
        }

        // 4. Pengecekan Hak Akses Dinamis Operator (Berdasarkan Checkbox)
        $menus = is_array($user->menu_access) ? $user->menu_access : [];

        // Jika rute mengandung kata 'paslon' TAPI dia tidak punya izin paslon
        if ($request->is('paslon*') && !in_array('paslon', $menus)) {
            return redirect()->route('home')->with('error', 'Akses Ditolak! Anda tidak memiliki izin mengelola Data Paslon.');
        }

        // Jika rute mengandung kata 'dpt' TAPI dia tidak punya izin dpt
        if ($request->is('dpt*') && !in_array('dpt', $menus)) {
            return redirect()->route('home')->with('error', 'Akses Ditolak! Anda tidak memiliki izin mengelola Data DPT.');
        }

        // Jika semua aman, silakan lewat!
        return $next($request);
    }
}