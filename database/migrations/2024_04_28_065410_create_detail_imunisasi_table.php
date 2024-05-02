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
        Schema::create('detail_imunisasi', function (Blueprint $table) {
            $table->bigIncrements('id_detail_posyandu');
            $table->unsignedBigInteger('id_vaksin');
            $table->foreign('id_vaksin')->references('id_vaksin')->on('imunisasi')->onDelete('cascade');
            $table->string('nik_anak');
            $table->foreign('nik_anak')->references('nik_anak')->on('anak')->onUpdate('cascade');
            $table->unsignedBigInteger('id_jadwal');
            $table->foreign('id_jadwal')->references('id_jadwal')->on('jadwal_posyandu')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_imunisasi');
    }
};
