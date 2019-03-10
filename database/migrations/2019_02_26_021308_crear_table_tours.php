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
            $table->string('name')->nullable();
            $table->integer('duracion')->nullable();
            $table->integer('precio')->nullable();
            $table->string('short_description')->nullable();
            $table->string('long_description')->nullable();
            $table->boolean('adults')->nullable();
            $table->boolean('children')->nullable();
            $table->boolean('infants')->nullable();
            $table->boolean('buggies')->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('important')->nullable();
            $table->integer('days')->nullable();
            $table->integer('likes')->nullable();
            $table->string('fotos')->nullable();        
            $table->integer('zona_id')->unsigned()->nullable();
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
