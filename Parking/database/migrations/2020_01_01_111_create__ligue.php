<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Ligues', function (Blueprint $table) {
            $table->string('NumLigue');
            $table->string('AdresseRue')->nullable();
            $table->string('CP')->nullable();
            $table->string('Ville')->nullable();
            $table->string('Nom');
            $table->engine = "InnoDB";

        });

        Schema::table('Ligues',function (Blueprint $table) {
            $table->primary('NumLigue');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Ligues');
    }
}
