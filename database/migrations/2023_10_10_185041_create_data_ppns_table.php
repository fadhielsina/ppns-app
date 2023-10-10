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
            $table->string('nama');
            $table->string('nip');
            $table->string('pangkat');
            $table->string('bulan_tahun');
            $table->string('status');
            $table->string('status_lantik');
            $table->string('instansi');
            $table->string('wilayah_kerja');
            $table->string('jabatan');
            $table->string('no_sk_ppns');
            $table->string('masa_berlaku');
            $table->longText('keterangan');
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
