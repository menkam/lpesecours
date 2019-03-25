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
            $table->text('lien');
            $table->text('icon');
            $table->text('route')->nullable();
            $table->integer('position')->default('100');
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
        Schema::dropIfExists('menus');
    }
}
