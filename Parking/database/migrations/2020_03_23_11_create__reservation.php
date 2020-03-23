<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Reservations', function (Blueprint $table) {
            $table->bigIncrements('NumReservation');
            $table->date('DateReservation');
            $table->date('DateExpiration');
            $table->integer('NumPlace');
            $table->string('IDpersonne');
            $table->string('Fin');

        });

        Schema::table('Reservations',function (Blueprint $table) {
            $table->foreign('NumPlace')->references('NumPlace')->on('Places');
            $table->foreign('IDpersonne')->references('IDpersonne')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
