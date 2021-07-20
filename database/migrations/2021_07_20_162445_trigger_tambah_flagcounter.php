<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TriggerTambahFlagcounter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::unprepared('CREATE TRIGGER flagpostambah BEFORE INSERT ON flagpos
        FOR EACH ROW
                    UPDATE `pos` SET flagcounter=flagcounter+1
            WHERE idpos=NEW.idpos ;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Illuminate\Support\Facades\DB::unprepared('DROP TRIGGER `flagpostambah`');
    }

}
