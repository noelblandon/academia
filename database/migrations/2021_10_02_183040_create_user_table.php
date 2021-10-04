<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('nombre',100);
            $table->string('apellido',100);
            $table->string('user',100);
            $table->string('pass',100);
            $table->unsignedInteger('tipo_user');            
            $table->foreign('tipo_user')->references('id_tipo_user')->on('tipo_user');     
            $table->enum('estado',['activo','inactivo']);            
            $table->unsignedInteger('id_docente')->default(0);                       
            $table->foreign('id_docente')->references('id_docente')->on('docentes'); 
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
        Schema::dropIfExists('user');
    }
}
