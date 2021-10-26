<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstname')->first();
            $table->string('lastname')->after('firstname');
            $table->string('country')->after('email');
            $table->string('city')->after('country');
            $table->string('street')->after('city');
            $table->string('house_number')->after('street');
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
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('country');
            $table->dropColumn('city');
            $table->dropColumn('street');
            $table->dropColumn('house_number');
        });
    }
}
