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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('id_karyawan')->nullable();
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawan');
            $table->unsignedBigInteger('id_pelamar')->nullable();
            $table->foreign('id_pelamar')->references('id_pelamar')->on('pelamar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
