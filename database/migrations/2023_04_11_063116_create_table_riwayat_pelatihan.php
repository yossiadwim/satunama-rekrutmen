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
        Schema::create('riwayat_pelatihan', function (Blueprint $table) {
            $table->id('id_pelatihan');
            $table->unsignedBigInteger('id_pelamar');
            $table->foreign('id_pelamar')->references('id_pelamar')->on('pelamar');
            $table->date('tanggal_pelatihan');
            $table->string('nama_pelatihan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pelatihan');
    }
};
