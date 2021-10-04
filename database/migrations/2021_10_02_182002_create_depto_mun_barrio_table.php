<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeptoMunBarrioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depto_mun_barrio', function (Blueprint $table) {
            $table->increments('id_barrio');
            $table->string('nom_barrio',100);
            $table->unsignedInteger('id_mun');
            $table->foreign('id_mun')->references('id_mun')->on('depto_municipio');
            $table->engine='InnoDB'; 	
            $table->charset='utf8mb4'; 
            $table->collation='utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('depto_mun_barrio');
    }
}
