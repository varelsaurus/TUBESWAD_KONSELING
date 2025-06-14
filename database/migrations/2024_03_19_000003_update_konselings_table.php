<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('konselings', function (Blueprint $table) {
            $table->id('konselingId');
            $table->string('nama_mahasiswa');
            $table->string('topik');
            $table->dateTime('waktu_konseling');
            $table->enum('status', ['menunggu', 'diterima', 'ditolak', 'selesai'])->default('menunggu');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('konselings');
    }
}; 