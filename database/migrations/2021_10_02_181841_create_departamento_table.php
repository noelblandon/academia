<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamento', function (Blueprint $table) {
            $table->increments('id_depto');
            $table->string('nom_depto',100);
            $table->engine='InnoDB'; 	
            $table->charset='utf8mb4'; 
            $table->collation='utf8mb4_unicode_ci';

        });
    }
/**
 * 
 * Comando 	Descripción

 * 
 * 
 * 
 */
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamento');
    }
}
