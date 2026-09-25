<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat akun Super Admin
        User::create([
            'name' => 'Super Admin',
            'username' => 'admin',
            'password' => Hash::make('password123'), // Password akan dienkripsi
            'role' => 'superadmin',
        ]);

        // Membuat akun Operator (Panitia Absen)
        User::create([
            'name' => 'Panitia Meja 1',
            'username' => 'panitia1',
            'password' => Hash::make('panitia123'),
            'role' => 'operator',
        ]);
    }
}
