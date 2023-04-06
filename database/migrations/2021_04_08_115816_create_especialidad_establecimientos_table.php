<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadEstablecimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidad_establecimientos', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('especialidad_id'); 
            $table->unsignedBigInteger('establecimiento_id');   
            $table->timestamps();

            $table->foreign('establecimiento_id')->references('id')->on('establecimientos');
            $table->foreign('especialidad_id')->references('id')->on('especialidades'); 
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('especialidad_establecimientos');
    }
}
