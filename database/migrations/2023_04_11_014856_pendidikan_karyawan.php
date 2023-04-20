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
        Schema::create('pendidikan_karyawan', function (Blueprint $table) {
            $table->id('id_pendidikan');
            $table->string('id_karyawan');
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawan');
            $table->string('jenjang_pendidikan');
            $table->string('jurusan');
            $table->string('ipk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikan_karyawan');
    }
};
