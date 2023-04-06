<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablecimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establecimientos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre',100); 

            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('cuit')->nullable(); 
            $table->string('calle')->nullable();
            $table->integer('numero')->nullable();
            $table->integer('piso')->nullable();
            $table->string('depto')->nullable(); 
            
            $table->unsignedBigInteger('tipo_establecimiento_id'); 
            $table->foreign('tipo_establecimiento_id')->references('id')->on('tipo_establecimientos');

            $table->integer('localidad_id'); 
            $table->foreign('localidad_id')->references('id')->on('localidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('establecimientos');
    }
}
