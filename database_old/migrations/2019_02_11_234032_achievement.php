<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Achievement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('achievement_master', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('content');
            $table->string('pic');
            $table->enum('status',[0,1]);
            $table->string('created_by');
            $table->dateTime('created_on');
         });  
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('achievement_master');
    }
}
