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
        //
        Schema::create('konsentrasi', function (Blueprint $table) {
            $table->string('id_konsentrasi', 10)->primary();
            $table->string('id_prodi', 10);
            $table->string('nama_konsentrasi', 25);
            $table->foreign('id_prodi')->references('id_prodi')->on('prodi')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */

    
    public function down(): void
    {
        //
        Schema::dropIfExists('konsentrasi');
    }
};
