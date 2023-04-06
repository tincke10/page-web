<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('prestadores', function (Blueprint $table) {
            $table->id();
            $table->string('matricula')->nullable(); 
            $table->unsignedBigInteger('especialidad_id'); 
            $table->unsignedBigInteger('personas_id');  
            $table->unsignedBigInteger('tipo_prestadores_id'); 
            $table->timestamps();

            $table->foreign('personas_id')->references('id')->on('personas');
            $table->foreign('especialidad_id')->references('id')->on('especialidades'); 
            $table->foreign('tipo_prestadores_id')->references('id')->on('tipo_prestadores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestadores');
    }
}
