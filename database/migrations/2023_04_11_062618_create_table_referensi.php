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
        Schema::create('referensi', function (Blueprint $table) {
            $table->id('id_referensi');
            $table->string('nama');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('hubungan');
            $table->string('posisi');
            $table->unsignedBigInteger('id_pelamar');
            $table->foreign('id_pelamar')->references('id_pelamar')->on('pelamar');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referensi');
    }
};
