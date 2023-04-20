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
        Schema::create('tes_tertulis', function (Blueprint $table) {
            $table->id('id_tes_tertulis');
            $table->date('tanggal_tes');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->smallInteger('skor');
            $table->unsignedBigInteger('id_pelamar_lowongan');
            $table->foreign('id_pelamar_lowongan')->references('id_pelamar_lowongan')->on('pelamar_lowongan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tes_tertulis');
    }
};
