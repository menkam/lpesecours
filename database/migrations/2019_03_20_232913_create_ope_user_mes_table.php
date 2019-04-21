<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpeUserMesTable extends Migration
{
    /**
     * Run the migrations.
     *ope_user_mes
     * @return void
     */
    public function up()
    {
        Schema::create('message_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('message_id')->unsigned();
            $table->integer('statut')->default('0');
            $table->timestamps();

            $table->unique(['user_id','message_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_user');
    }
}
