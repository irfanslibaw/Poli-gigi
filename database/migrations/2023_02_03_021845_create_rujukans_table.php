<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRujukansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rujukans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pasien_id');
            $table->string('umur',255);
            $table->string('alamat',255);
            $table->string('no_hp',255);
            $table->string('kasus',255);
            $table->string('keluhan',255);
            $table->string('diagnosa',255);
            $table->string('terapi',255);
            $table->string('tanggal',60);
            $table->bigInteger('dokter_id');
            $table->string('dr_tujuan',60);
            $table->string('rs_tujuan',60);
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
        Schema::dropIfExists('rujukans');
    }
}
