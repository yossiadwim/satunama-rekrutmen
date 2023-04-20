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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->string('id_karyawan')->primary();
            $table->string('nama_karyawan');
            $table->enum('status_karyawan',['Magang','Tetap','Kontrak','Paruh waktu','unknown']);
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');
            $table->text('alamat_karyawan');
            $table->enum('jenis_kelamin',['Pria','Wanita','Lainnya']);
            $table->string('nik');
            $table->date('tanggal_lahir');
            $table->string('email')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
