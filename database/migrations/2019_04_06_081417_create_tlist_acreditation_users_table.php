<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTlistAcreditationUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tlist_acreditation_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tlist_acreditation_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('tlist_acreditation_id')->references('id')->on('tlist_acreditations');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tlist_acreditation_user');
    }
}
