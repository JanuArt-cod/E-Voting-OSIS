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
        Schema::create('dpts', function (Blueprint $table) {
            $table->id();
            // NISN (Nomor Induk Siswa Nasional) bersifat unik, tidak boleh ada yang kembar
            $table->string('nisn')->unique(); 
            $table->string('nama');
            $table->string('kelas');
            // Username dan Token untuk login siswa di PC Bilik Suara
            $table->string('username')->unique(); 
            $table->string('token')->unique();    
            // Status pilih: 0 = Belum Memilih, 1 = Sudah Memilih
            // Kita pakai tipe data boolean dengan nilai default 0
            $table->boolean('status_pilih')->default(0); 
            // Mencatat jam berapa siswa tersebut mencoblos
            // nullable() karena saat awal data diinput, siswa belum memilih
            $table->timestamp('waktu_memilih')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dpts');
    }
};
