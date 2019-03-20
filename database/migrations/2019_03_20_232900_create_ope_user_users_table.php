<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpeUserUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ope_user_users', function (Blueprint $table) {
            $table->integer('id_operation');
            $table->integer('id_user');
            $table->integer('id_user2');
            $table->timestamps();

            $table->primary(['id_operation','id_user']);
            $table->foreign('id_operation')->references('id')->on('operations');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_user2')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ope_user_users');
    }
}
