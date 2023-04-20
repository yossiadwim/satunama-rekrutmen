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
        Schema::create('hasil_tes_tertulis', function (Blueprint $table) {
            $table->id('id_hasil_tes_tertulis');
            $table->unsignedBigInteger('id_tes_tertulis');
            $table->foreign('id_tes_tertulis')->references('id_tes_tertulis')->on('tes_tertulis');
            $table->smallInteger('total_skor');
        
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_tes_tertulis');
    }
};
