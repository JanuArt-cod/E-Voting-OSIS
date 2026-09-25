<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Jalankan Seeder User dan Paslon
        $this->call([
            UserSeeder::class,
            PaslonSeeder::class,
        ]);

        // 2. Jalankan Factory Dpt untuk membuat 50 data siswa otomatis!
        \App\Models\Dpt::factory(50)->create();
    }
}
