<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobileMoneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_moneys', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->unique();
            $table->integer('fond');
            $table->integer('pret');
            $table->string('espece');
            $table->integer('compte_momo');
            $table->integer('compte2');
            $table->integer('frais_transfert');
            $table->integer('commission');
            $table->integer('statut')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobile_moneys');
    }
}
