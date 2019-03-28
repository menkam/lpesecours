<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('idparent');
            $table->integer('idfils');
            $table->text('libelle')->unique();
            $table->text('lien')->nullable();
            $table->text('icon')->nullable();
            $table->text('route')->nullable();
            $table->text('controller')->nullable();
            $table->text('fichiercontoller')->nullable();
            $table->text('fichierview')->nullable();
            $table->integer('groupeuser');
            $table->integer('rang')->default('100');
            $table->integer('valide')->default('0');
            $table->integer('statut')->default('1');
            $table->timestamps();

            $table->foreign('groupeuser')->references('id')->on('tlist_groupe_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
