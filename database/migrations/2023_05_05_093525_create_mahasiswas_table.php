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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('npm');
            $table->string('nama');
            $table->string('tanggal_lahir');
            $table->string('kota_lahir');
            $table->char('foto');
            $table->uuid('prodi_id');
            $table->foreign('prodi_id')->references('id')->on('prodi')->cascadeOnDelete()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
