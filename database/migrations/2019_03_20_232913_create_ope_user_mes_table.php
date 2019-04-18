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
            $table->integer('id_user_recive');
            $table->integer('id_message');
            $table->integer('statut')->default('0');
            $table->timestamps();

            //$table->primary(['id_operation','id_user','id_message']);
            $table->foreign('id_operation')->references('id')->on('operations')->onDelete('cascade');
            $table->foreign('id_user_recive')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_message')->references('id')->on('messages')->onDelete('cascade');
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
