<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTableTours extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('duracion');
            $table->integer('precio');
            $table->string('short_description');
            $table->string('long_description');
            $table->boolean('adults');
            $table->boolean('children');
            $table->boolean('infants');
            $table->boolean('buggies');
            $table->boolean('status');
            $table->boolean('important');
            $table->integer('days');
            $table->integer('likes');
            $table->string('fotos');

            $table->integer('zona_id')->unsigned();
            $table->foreign('zona_id')->references('id')->on('zonas');

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
        Schema::dropIfExists('tours');
    }
}
