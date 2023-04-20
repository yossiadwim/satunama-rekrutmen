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
        Schema::create('kondisi_kesehatan', function (Blueprint $table) {
            $table->id('id_penyakit');
            $table->string('nama_penyakit');
            $table->boolean('penyakit_serius');
            $table->boolean('pernah_operasi');
            $table->enum('golongan_darah',['A','B','O','AB']);
            $table->unsignedBigInteger('id_pelamar');
            $table->foreign('id_pelamar')->references('id_pelamar')->on('pelamar');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kondisi_kesehatan');
    }
};
