<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paslon;

class PaslonSeeder extends Seeder
{
    public function run(): void
    {
        Paslon::create([
            'nomor_urut' => 1,
            'nama_ketua' => 'Ahmad Fikri',
            'nama_wakil' => 'Siti Aminah',
            'visi' => 'Mewujudkan OSIS yang Kreatif dan Inovatif.',
            'misi' => '1. Mengadakan pensi rutin. 2. Mendukung e-sport sekolah.',
        ]);

        Paslon::create([
            'nomor_urut' => 2,
            'nama_ketua' => 'Budi Santoso',
            'nama_wakil' => 'Rina Melati',
            'visi' => 'OSIS sebagai wadah aspirasi siswa yang berakhlak mulia.',
            'misi' => '1. Program jumat bersih. 2. Lomba cerdas cermat antar kelas.',
        ]);
    }
}
