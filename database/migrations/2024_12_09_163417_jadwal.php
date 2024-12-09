<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->string('id_jadwal', 10)->primary();
            $table->date('tanggal');
            $table->time('jam_masuk');
            $table->time('jam_selesai');
            $table->string('id_matkul', 10);
            $table->string('id_dosen', 10);
            $table->string('id_ruangan', 10);
            $table->string('id_kelas', 10);
            
            $table->foreign('id_matkul')->references('id_matkul')->on('matkul')->onDelete('cascade');
            $table->foreign('id_dosen')->references('id_dosen')->on('dosen')->onDelete('cascade');
            $table->foreign('id_ruangan')->references('id_ruangan')->on('ruangan')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
