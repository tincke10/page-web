<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('apellido'); 
            $table->string('nombres');  
            $table->bigInteger('telefono')->nullable();
            $table->date('nacimiento')->nullable();
            $table->bigInteger('cuit')->unique(); 
            $table->string('calle')->nullable();
            $table->integer('numero')->nullable();
            $table->integer('piso')->nullable();
            $table->string('depto')->nullable(); 
            
            $table->integer('localidad_id');
            $table->foreign('localidad_id')->references('id')->on('localidades');


            $table->unsignedBigInteger('user_id')->nullable(); 
            $table->foreign('user_id')->references('id')->on('users'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
