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
        Schema::create('anak', function (Blueprint $table) {
            $table->string('nik_anak')->primary();
            $table->string('nama_anak');
            $table->string('tempat_lahir_anak');
            $table->date('tanggal_lahir_anak');
            $table->integer('anak_ke');
            $table->string('gol_darah_anak');
            $table->integer('umur_anak');
            $table->string('jenis_kelamin_anak');
            $table->string('nik_ibu'); 
            $table->timestamps();
            $table->foreign('nik_ibu')->references('nik_ibu')->on('orang_tua')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anak');
    }
};
