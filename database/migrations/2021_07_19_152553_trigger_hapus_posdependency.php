<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TriggerHapusPosdependency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::unprepared('CREATE TRIGGER posdependency BEFORE DELETE ON pos
        FOR EACH ROW
        BEGIN
                    DELETE FROM `laporhilang` WHERE idpos=OLD.idpos;
                    DELETE FROM `bookmarkpos` WHERE idpos=OLD.idpos;
                    DELETE FROM `flagpos` WHERE idpos=OLD.idpos;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Illuminate\Support\Facades\DB::unprepared('DROP TRIGGER `posdependency`');
    }
}
