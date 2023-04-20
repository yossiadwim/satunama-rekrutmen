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
        Schema::table('pendidikan_karyawan', function (Blueprint $table) {
            $table->bigInteger('id_pelamar')->nullable();
            $table->foreign('id_pelamar')->references('id')->on('pelamar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendidikan_karyawan', function (Blueprint $table) {
            //
        });
    }
};
