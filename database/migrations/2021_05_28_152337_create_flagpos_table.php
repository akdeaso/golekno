<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlagposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flagpos', function (Blueprint $table) {
            $table->id('idflag');
            $table->bigInteger('idpos')->unsigned();
            $table->foreign('idpos')->references('idpos')->on('pos');
            $table->bigInteger('idakun')->unsigned();
            $table->foreign('idakun')->references('idakun')->on('akun');
            $table->string('alasan', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flagpos');
    }
}
