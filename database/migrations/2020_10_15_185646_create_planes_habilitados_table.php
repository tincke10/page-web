<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanesHabilitadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes_habilitados', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('plan_id');
            
            $table->unsignedBigInteger('consultorio_id')->nullable();
            $table->unsignedBigInteger('establecimiento_id')->nullable();
            
            $table->foreign('plan_id')->references('id')->on('planes');
            $table->foreign('consultorio_id')->references('id')->on('consultorios');
            $table->foreign('establecimiento_id')->references('id')->on('establecimientos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planes_habilitados');
    }
}
