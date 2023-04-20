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
        Schema::create('jabatan_karyawan', function (Blueprint $table) {
            $table->id('id_jabatan_karyawan');
            $table->integer('id_departemen')->nullable();
            $table->foreign('id_departemen')->references('id_departemen')->on('departemen');
            $table->integer('id_unit')->nullable();
            $table->foreign('id_unit')->references('id_unit')->on('unit');
            $table->string('id_karyawan')->nullable();
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawan');
            $table->date('waktu_mulai');
            $table->date('waktu_selesai')->nullable();
            $table->integer('id_jabatan');
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatan');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jabatan_karyawan');
    }
};
