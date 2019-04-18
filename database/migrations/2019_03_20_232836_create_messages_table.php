<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_message');
            $table->integer('id_user_send');
            $table->text('objet');
            $table->text('libelle');
            $table->integer('statut')->default(1);
            $table->timestamps();

            $table->foreign('type_message')->references('id')->on('tlist_messages')->onDelete('cascade');
            $table->foreign('id_user_send')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
