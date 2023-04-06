<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablecimientosPlanesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establecimientos_planes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->boolean('habilitado');
            $table->text('detalle');  
            $table->unsignedBigInteger('plan_id');
             
            $table->unsignedBigInteger('establecimiento_id')->nullable();
            
            $table->foreign('plan_id')->references('id')->on('planes');
            
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
