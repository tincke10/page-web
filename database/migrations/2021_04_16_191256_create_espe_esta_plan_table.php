<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspeEstaPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('espe_esta_plan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plan_id')->references('id')->on('planes')->onDelete('cascade');  
            $table->foreignId('espe_esta_id')->references('id')->on('espe_esta')->onDelete('cascade');  
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
        Schema::dropIfExists('espe_esta_pla');
    }
}
