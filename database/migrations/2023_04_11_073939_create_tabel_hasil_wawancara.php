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
        Schema::create('hasil_wawancara', function (Blueprint $table) {
            $table->id('id_hasil_wawancara');
            $table->unsignedBigInteger('id_wawancara');
            $table->foreign('id_wawancara')->references('id_wawancara')->on('wawancara');
            $table->text('isi_hasil_wawancara');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_wawancara');
    }
};
