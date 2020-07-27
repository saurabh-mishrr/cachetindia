<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileTrailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_trail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('csv_file_path');
            $table->string('tar_file_path');
            $table->string('status');
            $table->string('type_of_upload'); //this could be salary_slip or form_16 or else
            $table->unsignedInteger('uploaded_by');
            $table->index('uploaded_by');
            $table->foreign('uploaded_by')->references('emp_id')->on('employee_master');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_trail');
    }
}
