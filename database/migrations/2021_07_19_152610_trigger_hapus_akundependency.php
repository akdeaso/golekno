<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TriggerHapusAkundependency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::unprepared('CREATE TRIGGER akundependency BEFORE DELETE ON akun
        FOR EACH ROW
        BEGIN
                    DELETE FROM `pos` WHERE idakun=OLD.idakun;
                    DELETE FROM `laporhilang` WHERE idakun=OLD.idakun;
                    DELETE FROM `bookmarkpos` WHERE idakun=OLD.idakun;
                    DELETE FROM `flagpos` WHERE idakun=OLD.idakun;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Illuminate\Support\Facades\DB::unprepared('DROP TRIGGER `akundependency`');
    }
}
