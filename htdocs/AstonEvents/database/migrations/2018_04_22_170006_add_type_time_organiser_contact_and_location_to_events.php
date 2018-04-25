<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeTimeOrganiserContactAndLocationToEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function($table){
            $table->string('event_type');
            $table->DATETIME('event_start_day');
            $table->DATETIME('event_end');
            $table->string('event_location');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function($table){
            $table->dropColumn('event_type');
            $table->dropColumn('event_start');
            $table->dropColumn('event_end');
            $table->dropColumn('event_location');
            $table->dropColumn('user_id');
        }); 
    }
}
