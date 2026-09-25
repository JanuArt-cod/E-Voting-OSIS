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
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            // Membuat Foreign Key (Kunci Tamu) yang terhubung ke tabel paslons
            // cascadeOnDelete() artinya: Jika ada data Paslon yang dihapus, 
            // maka semua suara miliknya akan ikut terhapus otomatis agar tidak ada data "nyangkut".
            $table->foreignId('paslon_id')->constrained('paslons')->cascadeOnDelete();
            
            // Mencatat kapan suara tersebut masuk ke dalam kotak suara digital
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
