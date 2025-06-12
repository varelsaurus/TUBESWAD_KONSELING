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
        Schema::create('keluhan', function (Blueprint $table) {
            $table->id('keluhanId');
            $table->unsignedBigInteger('mahasiswaId');
            $table->text('pesan');
            $table->enum('status', ['baru', 'diproses', 'selesai'])->default('baru');
            $table->timestamps();

            $table->foreign('mahasiswaId')->references('mahasiswaId')->on('mahasiswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
