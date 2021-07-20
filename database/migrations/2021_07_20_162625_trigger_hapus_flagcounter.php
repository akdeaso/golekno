<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TriggerHapusFlagcounter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::unprepared('CREATE TRIGGER flagposhapus BEFORE DELETE ON flagpos
        FOR EACH ROW
                    UPDATE `pos` SET flagcounter=0
            WHERE idpos=OLD.idpos ;');
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
