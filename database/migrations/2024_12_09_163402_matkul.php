<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('matkul', function (Blueprint $table) {
            $table->string('id_matkul', 10)->primary();
            $table->string('nama_matkul', 25);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matkul');
    }
};
