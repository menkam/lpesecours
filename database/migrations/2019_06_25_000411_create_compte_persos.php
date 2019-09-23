<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComptePersos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compte_persos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->integer('type');
            $table->integer('user');
            $table->integer('somme');
            $table->string('commentaire')->default('RAS');
            $table->integer('statut')->default('1');
            $table->timestamps();

            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('type')->references('id')->on('tlist_compte_persos')->onDelete('cascade');
            $table->unique('date','type','user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compte_persos');
    }
}
