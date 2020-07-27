<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsersA extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('cn', 150)->nullable();
            $table->string('sn', 150)->nullable();
            $table->string('givenname', 150)->nullable();
            $table->string('distinguishedname', 150)->nullable();
            $table->string('instancetype', 150)->nullable();
            $table->string('whencreated', 150)->nullable();
            $table->string('whenchanged', 150)->nullable();
            $table->string('displayname', 150)->nullable();
            $table->string('usncreated', 150)->nullable();
            $table->string('memberof', 150)->nullable();
            $table->string('usnchanged', 150)->nullable();
            $table->string('useraccountcontrol', 150)->nullable();
            $table->string('badpwdcount', 150)->nullable();
            $table->string('codepage', 150)->nullable();
            $table->string('countrycode', 150)->nullable();
            $table->string('badpasswordtime', 150)->nullable();
            $table->string('lastlogoff', 150)->nullable();
            $table->string('lastlogon', 150)->nullable();
            $table->string('pwdlastset', 150)->nullable();
            $table->string('primarygroupid', 150)->nullable();
            $table->string('admincount', 150)->nullable();
            $table->string('accountexpires', 150)->nullable();
            $table->string('logoncount', 150)->nullable();
            $table->string('samaccountname', 150)->nullable();
            $table->string('samaccounttype', 150)->nullable();
            $table->string('userprincipalname', 150)->nullable();
            $table->string('lastlogontimestamp', 150)->nullable();
            $table->string('roles', 150)->nullable();
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
                'cn',
                'sn',
                'givenname',
                'distinguishedname',
                'instancetype',
                'whencreated',
                'whenchanged',
                'displayname',
                'usncreated',
                'memberof',
                'usnchanged',
                'useraccountcontrol',
                'badpwdcount',
                'codepage',
                'countrycode',
                'badpasswordtime',
                'lastlogoff',
                'lastlogon',
                'pwdlastset',
                'primarygroupid',
                'admincount',
                'accountexpires',
                'logoncount',
                'samaccountname',
                'samaccounttype',
                'userprincipalname',
                'lastlogontimestamp',
                'roles'
            ]);
        });
    }
}
