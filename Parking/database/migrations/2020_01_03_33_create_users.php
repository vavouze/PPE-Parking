<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('IDpersonne');
            $table->string('MotDePasse');
            $table->string('Nom');
            $table->string('Prenom');
            $table->string('Tel')->nullable();
            $table->string('AdRue')->nullable();
            $table->string('CP')->nullable();
            $table->string('Ville')->nullable();
            $table->string('Mail')->unique();
            $table->integer('Etat');
            $table->string('IdLigue');
            $table->integer('Rang')->nullable();
            $table->rememberToken();
            $table->engine = "InnoDB";

        });

        Schema::table('users',function (Blueprint $table) {
            $table->primary('IDpersonne');
            $table->foreign('IdLigue')->references('NumLigue')->on('Ligues')->onDelete('cascade');
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
