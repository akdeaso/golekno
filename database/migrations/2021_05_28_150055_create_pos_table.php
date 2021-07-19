<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos', function (Blueprint $table) {
            $table->id('idpos');
            $table->bigInteger('idakun')->unsigned();
            $table->foreign('idakun')->references('idakun')->on('akun');
            $table->integer('flagcounter')->length(3);
            $table->boolean('tipepos');
            $table->string('foto', 255)->nullable();
            $table->boolean('gender');
            $table->integer('umur')->length(3);
            $table->integer('tinggibadan')->length(3);
            $table->string('deskripsi', 255);
            $table->string('kontak', 100);
            $table->string('nama', 50);
            $table->date('tanggal');
            $table->string('tempat', 100);
            $table->tinyInteger('statuspos')->length(1);
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
        Schema::dropIfExists('pos');
    }
}
