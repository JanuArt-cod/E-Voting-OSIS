<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paslon extends Model
{
    use HasFactory;
    // 1. $fillable: Mendaftarkan kolom yang diizinkan untuk diisi lewat form (Mass Assignment)
    protected $fillable = [
        'nomor_urut', 
        'nama_ketua', 
        'nama_wakil', 
        'foto', 
        'visi', 
        'misi'
    ];

    // 2. Relationship: Satu Paslon memiliki Banyak Suara (One to Many)
    public function votes()
    {
        // hasMany artinya "Memiliki Banyak". 
        // Kita hubungkan ke model Vote yang akan kita buat nanti.
        return $this->hasMany(Vote::class);
    }
}
