<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeptoMunicipioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depto_municipio', function (Blueprint $table) {
            $table->increments('id_mun');
            $table->string('nom_mun',100);
            $table->unsignedInteger('id_depto');
            $table->foreign('id_depto')->references('id_depto')->on('departamento');
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
        Schema::dropIfExists('depto_municipio');
    }
}
