<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookmarkposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookmarkpos', function (Blueprint $table) {
            $table->id('idbookmark');
            $table->bigInteger('idpos')->unsigned();
            $table->foreign('idpos')->references('idpos')->on('pos');
            $table->bigInteger('idakun')->unsigned();
            $table->foreign('idakun')->references('idakun')->on('akun');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookmarkpos');
    }
}
