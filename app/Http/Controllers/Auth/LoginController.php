<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home'; // Setelah login sukses akan diarahkan ke halaman ini

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    // KITA TAMBAHKAN KODE INI:
    // Mengubah default email menjadi username untuk proses otentikasi
    public function username()
    {
        return 'username';
    }
}
