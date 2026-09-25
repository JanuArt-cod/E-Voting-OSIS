<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    // 1. Mendaftarkan kolom yang boleh diisi
    protected $fillable = ['paslon_id'];

    // 2. Relationship: Satu Suara dimiliki oleh (Belongs To) Satu Paslon
    public function paslon()
    {
        return $this->belongsTo(Paslon::class);
    }
}
