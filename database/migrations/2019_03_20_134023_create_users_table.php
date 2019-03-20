<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('groupe_user');
            $table->integer('acreditation');
            $table->text('name');
            $table->text('surname');
            $table->binary('photo')->unique();
            $table->date('date_nais');
            $table->text('sexe');
            $table->text('telephone')->unique();
            $table->text('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password');
            $table->rememberToken();
            $table->integer('statut');
            $table->timestamps();

            $table->foreign('groupe_user')->references('id')->on('tlist_groupe_users');
            $table->foreign('acreditation')->references('id')->on('tlist_acreditations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
