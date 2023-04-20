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
        Schema::create('pelamar_lowongan', function (Blueprint $table) {
            $table->id('id_pelamar_lowongan');
            $table->unsignedBigInteger('id_pelamar');
            $table->foreign('id_pelamar')->references('id_pelamar')->on('pelamar');
            $table->unsignedBigInteger('id_lowongan');
            $table->foreign('id_lowongan')->references('id_lowongan')->on('lowongan');
            $table->date('tanggal_melamar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelamar_lowongan');
    }
};
