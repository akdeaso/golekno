<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TriggerArsipPos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::unprepared('CREATE TRIGGER arsippos BEFORE DELETE ON pos
        FOR EACH ROW
                    INSERT INTO `arsippos` (`idpos`, `idakun`, `flagcounter`, `tipepos`, `foto`, `gender`,
                    `umur`, `tinggibadan`, `deskripsi`, `kontak`, `nama`, `tanggal`, `tempat`,
                    `statuspos`, `created_at`)
                    VALUES (OLD.idpos, OLD.idakun, OLD.flagcounter, OLD.tipepos, OLD.foto, OLD.gender,
                    OLD.umur, OLD.tinggibadan, OLD.deskripsi, OLD.kontak, OLD.nama, OLD.tanggal, OLD.tempat,
                    OLD.statuspos, OLD.updated_at);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Illuminate\Support\Facades\DB::unprepared('DROP TRIGGER `arsippos`');
    }
}
