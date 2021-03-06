<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpeUserGestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ope_user_gests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->integer('type');
            $table->date('date');

            //$table->primary(['id_operation','id_user','id_message']);
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('type')->references('id')->on('tlist_ope_gestions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ope_user_gests');
    }
}
