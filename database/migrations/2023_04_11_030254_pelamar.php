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
        Schema::table('pelamar', function (Blueprint $table) {
            $table->id('id_pelamar');
            $table->string('nik');
            $table->string('nama_pelamar');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('jenis_kelamin',['Pria','Wanita','Lainnya']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('telepon_rumah');
            $table->string('telpon_kantor');
            $table->string('suku');
            $table->string('kebangsaan');
            $table->unsignedSmallInteger('id_agama');
            $table->foreign('id_agama')->references('id_agama')->on('agama');
            $table->smallInteger('tinggi_badan');
            $table->smallInteger('berat_badan');
            $table->enum('status_perkawinan',['belum kawin','kawin','cerai hidup','cerai mati']);
            $table->string('nama_pasangan');
            $table->smallInteger('jumlah_anak');
            $table->text('hobi');
            $table->text('organisasi_yang sedang_atau_sudah_diikuti');
            
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
