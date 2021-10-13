<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEnable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habilitar_ce', function (Blueprint $table) {
            $table->increments('id_hab_CE');         
            $table->enum('hab_ICE',['Activar','Desactivar']);
            $table->enum('hab_IICE',['Activar','Desactivar']);
            $table->enum('hab_IIICE',['Activar','Desactivar']);
            $table->enum('hab_IVCE',['Activar','Desactivar']);
            $table->string('anioLectivo',50);          
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
        Schema::dropIfExists('habilitar_ce');
    }
}
