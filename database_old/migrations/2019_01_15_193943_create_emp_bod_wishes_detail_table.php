<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpBodWishesDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_bod_wishes_detail', function (Blueprint $table) {
            $table->increments('wishes_id');
            $table->unsignedInteger('emp_id');
            $table->longText('comment');
            $table->string('created_by');
            $table->string('updated_by');
            $table->dateTime('created_on');
            $table->dateTime('updated_on');
            $table->foreign('emp_id')->references('emp_id')->on('employee_master');
         //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emp_bod_wishes_detail');
    }
}
