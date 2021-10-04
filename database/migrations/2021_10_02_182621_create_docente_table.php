<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->increments('id_docente');
            $table->string('carnet',20);
            $table->string('nombre',100);
            $table->string('apellido',100);
            $table->string('cedula',20);
            $table->unsignedInteger('id_barrio');            
            $table->foreign('id_barrio')->references('id_barrio')->on('depto_mun_barrio');
            $table->string('direccion');
            $table->string('telefono',20)->nullable();
            $table->string('celular',20)->nullable();
            $table->string('fec_nac',20);
            $table->integer('edad');
            $table->enum('sexo',['Masculino','Femenino']);
            $table->string('nacionalidad',50);
            $table->string('religion',50);
            $table->string('inss',50)->nullable();
            $table->string('ordinal',30)->nullable();
            $table->string('f_ini',15)->nullable();
            $table->string('f_fin',15)->nullable();
            $table->unsignedInteger('id_carrera');                       
            $table->foreign('id_carrera')->references('id_carrera')->on('carreras');            
            $table->string('turno',50)->nullable();
            $table->string('estado',50)->nullable();
            $table->string('nivel',50)->nullable();
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
        Schema::dropIfExists('docentes');
    }
}
