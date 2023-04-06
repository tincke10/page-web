<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
 

            $table->string('apellido',100)->nullable();
            $table->string('nombres',100)->nullable();
            $table->string('nrodocumento',100)->nullable();
            $table->string('email',200)->nullable();
            $table->string('prefijo',50)->nullable();
            $table->string('telefono',50)->nullable();

            $table->string('localidad',100)->nullable(); 

            $table->text('consulta')->nullable();
            $table->date('fecha_reprogramacion')->nullable();
            $table->text('medio')->nullable();
            $table->string('estado',50)->nullable();
            $table->string('area',60)->nullable();

            $table->string('observaciones')->nullable(); 
            
            

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
        Schema::dropIfExists('consultas');
    }
}
