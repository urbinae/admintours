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
            $table->integer('precio')->nullable();
            $table->string('short_description', 100)->nullable();
            $table->text('long_description')->nullable();
            $table->boolean('status')->nullable();
            $table->string('foto', 20)->nullable();//foto principal
            $table->string('slug')->nullable();//cadena unica
                    
            $table->integer('zona_id')->unsigned()->nullable();
            $table->foreign('zona_id')->references('id')->on('zonas')->onDelete("cascade");
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
