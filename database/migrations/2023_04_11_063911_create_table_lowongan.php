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
        Schema::create('lowongan', function (Blueprint $table) {
            $table->id('id_lowongan');
            $table->unsignedBigInteger('id_departemen');
            $table->foreign('id_departemen')->references('id_departemen')->on('departemen');
            $table->string('nama_lowongan');
            $table->string('slug');
            $table->enum('tipe_lowongan',['Magang','Kontrak','Tetap']);
            $table->text('deskripsi');
            $table->timestamps();
            

            
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
