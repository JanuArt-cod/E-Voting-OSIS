<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; // Tambahkan ini untuk generate Token

class DptFactory extends Factory
{
    public function definition(): array
    {
        return [
            // Generate NISN acak 10 digit angka
            'nisn' => $this->faker->unique()->numerify('##########'),
            
            // Generate nama orang acak
            'nama' => $this->faker->name(),
            
            // Pilih kelas secara acak dari array ini
            'kelas' => $this->faker->randomElement(['X MIPA 1', 'XI IPS 2', 'XII RPL 1']),
            
            // Username acak (tanpa spasi)
            'username' => $this->faker->unique()->userName(),
            
            // Token acak 6 karakter (huruf & angka) dan di-uppercase
            'token' => strtoupper(Str::random(6)),
            
            // Default belum memilih
            'status_pilih' => 0, 
        ];
    }
}