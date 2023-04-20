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
        Schema::create('keluarga_pelamar', function (Blueprint $table) {
            $table->id('id_keluarga_pelamar');
            $table->string('hubungan');
            $table->string('nama');
            $table->enum('jenis_kelamin',['Pria','Wanita','Lainnya']);
            $table->date('tanggal_lahir');
            $table->enum('pendidikan_terakhir',['SD','SMP','SMA','SMK','D3','D4','S1','S2','S3']);
            $table->string('pekerjaan');
            $table->unsignedBigInteger('id_pelamar');
            $table->foreign('id_pelamar')->references('id_pelamar')->on('pelamar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keluarga_pelamar');
    }
};
