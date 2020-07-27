<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsersB extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('emp_code', 50);
            $table->string('designation', 200);
            $table->string('department', 200);
            $table->date('date_of_birth')->nullable();
            $table->string('location', 200)->nullable();
            $table->string('mobile_no', 20);
            $table->string('email_id', 100);
            $table->string('photo', 1000)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'emp_code',
                'designation',
                'department',
                'date_of_birth',
                'location',
                'mobile_no',
                'email_id',
                'photo'
            ]);
        });
    }
}
