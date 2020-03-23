<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlace extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Places', function (Blueprint $table) {
            $table->integer('NumPlace');
            $table->integer('Etat');


        });

        Schema::table('Places',function (Blueprint $table) {
            $table->primary('NumPlace');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Places');
    }
}
