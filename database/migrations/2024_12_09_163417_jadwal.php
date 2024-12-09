<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->integer('id_jadwal', 10)->primary();
            $table->date('tanggal');
            $table->time('jam_masuk');
            $table->time('jam_selesai');
            $table->integer('id_matkul')->unsigned();
            $table->integer('id_dosen')->unsigned();
            
            $table->foreign('id_matkul')->references('id_matkul')->on('matkul');
            $table->foreign('id_dosen')->references('id_dosen')->on('dosen');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};