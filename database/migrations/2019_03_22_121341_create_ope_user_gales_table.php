<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpeUserGalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ope_user_gales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_operation');
            $table->integer('id_user');
            $table->integer('id_galerie');
            $table->timestamps();

            //$table->primary(['id_operation','id_user','id_message']);
            $table->foreign('id_operation')->references('id')->on('operations');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_galerie')->references('id')->on('galerie_images_accueils');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ope_user_gales');
    }
}
