<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradoSeccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grado_seccion', function (Blueprint $table) {
            $table->increments('id_seccion');
            $table->string('nom_seccion',5);
            $table->string('n_seccion',5);
            $table->unsignedInteger('id_grado');
            $table->foreign('id_grado')->references('id_grado')->on('grado');
            $table->unsignedInteger('id_tutor');
            $table->foreign('id_tutor')->references('id_docente')->on('docentes');
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
        Schema::dropIfExists('grado_seccion');
    }
}
