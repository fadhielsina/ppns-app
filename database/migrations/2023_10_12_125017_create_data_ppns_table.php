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
        Schema::create('data_ppns', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('id_ppns')->unique();
            $table->string('nama');
            $table->string('no_surat');
            $table->string('nip');
            $table->bigInteger('pangkat_id')->unsigned()->index()->nullable();
            $table->foreign('pangkat_id')->references('id')->on('master_pangkats')->onDelete('cascade');
            $table->string('bulan_tahun');
            $table->string('status');
            $table->string('status_lantik');
            $table->bigInteger('instansi_id')->unsigned()->index()->nullable();
            $table->foreign('instansi_id')->references('id')->on('master_instansis')->onDelete('cascade');
            $table->bigInteger('wilayah_id')->unsigned()->index()->nullable();
            $table->foreign('wilayah_id')->references('id')->on('master_wilayahs')->onDelete('cascade');
            $table->bigInteger('jabatan_id')->unsigned()->index()->nullable();
            $table->foreign('jabatan_id')->references('id')->on('master_jabatans')->onDelete('cascade');
            $table->string('no_skep_ppns');
            $table->string('masa_berlaku');
            $table->longText('keterangan');
            $table->longText('pas_foto');
            $table->longText('foto_nik');
            $table->longText('foto_kta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_ppns');
    }
};
