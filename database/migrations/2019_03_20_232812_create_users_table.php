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
            $table->increments('id');
            $table->integer('groupe_user')->default(5);
            $table->integer('acreditation')->default(1);
            $table->text('name');
            $table->text('surname');
            $table->text('photo')->unique()->nullable();
            $table->date('date_nais')->nullable();
            $table->text('sexe');
            $table->text('telephone')->unique();
            $table->text('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password');
            $table->rememberToken();
            $table->integer('statut')->default(1);
            $table->timestamps();

            $table->foreign('groupe_user')->references('id')->on('tlist_groupe_users')->on('users')->onDelete('cascade');
            $table->foreign('acreditation')->references('id')->on('tlist_acreditations')->on('users')->onDelete('cascade');
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
