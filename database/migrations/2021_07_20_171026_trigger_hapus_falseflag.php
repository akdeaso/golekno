<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TriggerHapusFalseflag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::unprepared('CREATE TRIGGER falseflaghapus BEFORE DELETE ON flagpos
        FOR EACH ROW
                    DELETE FROM `flagpos` WHERE idpos=OLD.idpos;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Illuminate\Support\Facades\DB::unprepared('DROP TRIGGER `flagposhapus`');
    }
}
