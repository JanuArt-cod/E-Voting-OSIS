<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('paslons', function (Blueprint $table) {
            $table->id(); // ID unik utama bawaan Laravel (Primary Key)
            $table->integer('nomor_urut')->unique(); 
            $table->string('nama_ketua');
            $table->string('nama_wakil');
            // Kolom foto kita beri nullable() artinya "boleh dikosongkan"
            // Jaga-jaga kalau saat diinput, panitia belum punya foto paslonnya
            $table->string('foto')->nullable(); 
            // Visi dan misi kita pakai tipe 'text' agar bisa memuat tulisan yang panjang
            $table->text('visi');
            $table->text('misi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paslons');
    }
};
