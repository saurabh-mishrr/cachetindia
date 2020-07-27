<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('event_master', function (Blueprint $table) {
            $table->increments('event_id');
            $table->string('name');
            $table->string('type');
            $table->enum('status',[0,1]);
            $table->string('created_by');
            $table->string('updated_by');
            $table->dateTime('created_on');
            $table->dateTime('updated_on');
        });  
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_master');
    }
}
