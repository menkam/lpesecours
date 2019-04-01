<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCachetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cachets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('libelle');
            $table->integer('nombre');
            $table->integer('prix_unitaire');
            $table->timestamps();

            $table->foreign('libelle')->references('id')->on('tlist_cachets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cachets');
    }
}
