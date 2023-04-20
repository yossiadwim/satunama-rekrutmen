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
        Schema::create('penguasaan_bahasa', function (Blueprint $table) {
            $table->id('id_penguasaan_bahasa');
            $table->unsignedBigInteger('id_pelamar');
            $table->foreign('id_pelamar')->references('id_pelamar')->on('pelamar');
            $table->string('kode_bahasa');
            $table->string('nama_bahasa');
            $table->enum('tingkat_penguasaan',['Baik Sekali','Baik','Cukup']);
     
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penguasaan_bahasa');
    }
};
