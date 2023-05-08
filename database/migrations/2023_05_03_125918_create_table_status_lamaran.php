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
        Schema::create('status_lamaran', function (Blueprint $table) {
            $table->id('id_status_lamaran');
            $table->unsignedInteger('id_pelamar_lowongan');
            
            $table->date('tanggal');
            $table->unsignedBigInteger('id_status');
            $table->foreign('id_status')->references('id')->on('status');
            $table->string('approved_by');
            $table->foreign('approved_by')->references('id_karyawan')->on('karyawan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_lamaran');
    }
};
