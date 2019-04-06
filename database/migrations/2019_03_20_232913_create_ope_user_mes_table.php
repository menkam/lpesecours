<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpeUserMesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ope_user_mes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_operation');
            $table->integer('id_user');
            $table->integer('id_message');
            $table->timestamps();

            //$table->primary(['id_operation','id_user','id_message']);
            $table->foreign('id_operation')->references('id')->on('operations')->on('users')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->on('users')->onDelete('cascade');
            $table->foreign('id_message')->references('id')->on('messages')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ope_user_mes');
    }
}
