<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dosen', function (Blueprint $table) {
            $table->integer('id_dosen', 10)->primary();
            $table->string('nama_dosen', 50);
            $table->text('email');
            $table->text('no_telp');
            $table->integer('id_matkul')->unsigned();
            $table->foreign('id_matkul')->references('id_matkul')->on('matkul');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
