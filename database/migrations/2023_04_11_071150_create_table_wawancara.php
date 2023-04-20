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
        Schema::create('wawancara', function (Blueprint $table) {
            $table->id('id_wawancara');
            $table->string('nama_wawancara');
            $table->date('tanggal');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->unsignedBigInteger('id_pelamar_lowongan');
            $table->foreign('id_pelamar_lowongan')->references('id_pelamar_lowongan')->on('pelamar_lowongan');
        
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wawancara');
    }
};
