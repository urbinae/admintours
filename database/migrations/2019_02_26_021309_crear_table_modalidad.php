<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTableModalidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modalidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('duracion')->nullable();
            $table->integer('precio')->nullable();
            $table->string('short_description', 100)->nullable();
            $table->text('long_description')->nullable();
            $table->text('include')->nullable();//Lo que incluye el tour
            $table->text('restrictions')->nullable();//Restricciones
            $table->text('noforget')->nullable();//No olvidar
            $table->text('consider')->nullable();// Cosas a considerar
            $table->boolean('adults')->nullable();
            $table->boolean('children')->nullable();
            $table->boolean('infants')->nullable();
            $table->boolean('status')->nullable();//visible o no
            $table->boolean('important')->nullable();//Si es importante
            $table->string('days')->nullable();//dias disponibles: 1=lunes, 0=domingo
            $table->integer('likes')->nullable();
            $table->string('foto', 20)->nullable();//foto principal
            $table->string('fotos')->nullable();//galeria de fotos
            $table->string('keywords')->nullable();//para filtros de busqueda
            $table->string('slug')->nullable();//cadena unica
                    
            $table->integer('tour_id')->unsigned()->nullable();
            $table->foreign('tour_id')->references('id')->on('tours')->onDelete("cascade");
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
        Schema::dropIfExists('modalidades');
    }
}
