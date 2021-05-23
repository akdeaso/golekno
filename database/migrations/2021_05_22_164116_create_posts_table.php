<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Nama');
            $table->string('JenisPost');
            $table->datetime('Tanggal');
            $table->string('Tempat');
            $table->string('Gender');
            $table->integer('Umur');
            $table->integer('Tinggi');
            $table->integer('Berat');
            $table->string('Foto');
            $table->string('FotoTambahan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
