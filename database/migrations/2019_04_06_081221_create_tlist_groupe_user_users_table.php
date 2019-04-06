<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTlistGroupeUserUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tlist_groupe_user_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tlist_groupe_user_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('tlist_groupe_user_id')->references('id')->on('tlist_groupe_users');
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
        Schema::dropIfExists('tlist_groupe_user_user');
    }
}
