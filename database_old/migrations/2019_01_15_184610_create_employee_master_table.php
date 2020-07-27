<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_master', function (Blueprint $table) {
            $table->increments('emp_id');
            $table->string('emp_code');
            $table->string('emp_name');
            $table->string('designation');
            $table->text('location');
            $table->date('dob');
            $table->string('mobile_no');
            $table->string('email');
            $table->enum('status',[0,1]);
            $table->string('profile_pic');
            $table->string('created_by');
            $table->string('updated_by');
            $table->dateTime('created_on');
            $table->dateTime('updated_on');
           // $table->dropPrimary('employee_master_emp_id_primary');
            //$table->primary('emp_code');
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
        Schema::dropIfExists('employee_master');
    }
}
