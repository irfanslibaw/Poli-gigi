<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pasien_id');
            $table->bigInteger('dokter_id');
            $table->bigInteger('ruang_id');
            $table->bigInteger('pelayanan_id');
            $table->string('tanggal',60);
            $table->string('waktu',60);
            $table->string('alergi',255);
            $table->string('keluhan',255);
            $table->string('berat_badan',20);
            $table->string('tensi',20);
            $table->enum('status', ['S', 'B']);
            $table->bigInteger('obat_id')->nullable();
            $table->string('jumlah_obat',5)->nullable();
            $table->string('catatan',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanans');
    }
};
