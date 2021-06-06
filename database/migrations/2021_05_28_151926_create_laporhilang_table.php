<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporhilangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporhilang', function (Blueprint $table) {
            $table->id('idlapor');
            $table->bigInteger('idpos')->unsigned();
            $table->foreign('idpos')->references('idpos')->on('pos');
            $table->bigInteger('idakun')->unsigned();
            $table->foreign('idakun')->references('idakun')->on('akun');
            $table->string('kontak', 100);
            $table->string('tempatpenemuan', 100);
            $table->string('deskripsipenemuan', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporhilang');
    }
}
