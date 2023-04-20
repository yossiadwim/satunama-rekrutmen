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
        Schema::create('dokumen_lowongan_pelamar', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_dokumen');
            $table->foreign('id_dokumen')->references('id')->on('dokumen_pelamar');
            $table->bigInteger('id_pelamar_lowongan');
            $table->foreign('id_pelamar_lowongan')->references('id_pelamar_lowongan')->on('pelamar_lowongan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_lowongan_pelamar');
    }
};
