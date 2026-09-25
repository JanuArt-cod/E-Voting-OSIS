<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dpt extends Model
{
    use HasFactory;

    // Mendaftarkan kolom yang boleh diisi (Mass Assignment)
    protected $fillable = [
        'nisn', 
        'nama', 
        'kelas', 
        'username', 
        'token', 
        'status_pilih', 
        'waktu_memilih'
    ];
}
