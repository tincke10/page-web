<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultaLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulta_logs', function (Blueprint $table) {
            $table->id();
            
            $table->timestamps();
            $table->string('estado');
            $table->string('area');
            $table->date('fecha_reprogramacion')->nullable();
            $table->string('observaciones')->nullable();

            $table->unsignedBigInteger('consulta_id');   
            $table->foreign('consulta_id')->references('id')->on('consultas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consulta_logs');
    }
}
