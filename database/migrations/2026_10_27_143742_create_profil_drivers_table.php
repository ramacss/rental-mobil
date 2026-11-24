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
        Schema::create('profil_drivers', function (Blueprint $table) {
            $table->id(); // Ini otomatis jadi Primary Key
            
            // Tambahkan 4 baris ini:
            $table->string('nama');
            $table->string('nomor_sim');
            $table->string('status');
            $table->string('kontak');
            
            $table->timestamps(); // Ini otomatis mencatat waktu data dibuat/diedit
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_drivers');
    }
};
