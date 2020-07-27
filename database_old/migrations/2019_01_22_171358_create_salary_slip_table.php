<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalarySlipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('salary_slip', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedInteger('emp_id');
                $table->unsignedInteger('uploaded_by');
                $table->string('file_name');
                $table->timestamps();
                $table->integer('status');
                $table->string('year_month');
                $table->index('emp_id');
                $table->index('uploaded_by');
                $table->foreign('emp_id')->references('emp_id')->on('employee_master');
                $table->foreign('uploaded_by')->references('emp_id')->on('employee_master');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salary_slip');
    }
}
