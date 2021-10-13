<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableScore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->increments('idnotas');
            $table->string('carnet',45);
            $table->string('nombres',100);
            $table->string('apellidos',100);
            $table->string('cod_mined',20);
            $table->string('sexo',20);
            $table->string('asignatura',50);

            $table->string('ICE_cuant',3)->nullable();
            $table->string('ICE_cual',3)->nullable();
            $table->string('IICE_cuant',3)->nullable();
            $table->string('IICE_cual',3)->nullable();
            $table->string('ISemestre_cuant',3)->nullable();
            $table->string('ISemestre_cual',3)->nullable();
            $table->string('IIICE_cuant',3)->nullable();
            $table->string('IIICE_cual',3)->nullable();
            $table->string('IVCE_cuant',3)->nullable();
            $table->string('IVCE_cual',3)->nullable();
            $table->string('IISemestre_cuant',3)->nullable();
            $table->string('IISemestre_cual',3)->nullable();
            $table->string('notaFinal_cuant',3)->nullable();
            $table->string('notaFinal_cual',3)->nullable();


            $table->string('especial',30)->nullable();
            $table->string('docente',100)->nullable();
            $table->string('seccion',15)->nullable();          
            $table->string('grado',50)->nullable();
            $table->string('anioLectivo',50)->nullable();
            $table->string('lalf',50)->nullable();
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
        Schema::dropIfExists('notas');
    }
}
