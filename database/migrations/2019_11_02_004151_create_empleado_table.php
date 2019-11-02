<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->bigIncrements('codEmpleado');
            $table->string('nombre');
            $table->string('paterno');
            $table->string('materno');
            $table->date('fecha_nac');
            $table->string('telefono');
            $table->string('zona');
            $table->string('avenida');
            $table->string('nro');
            $table->string('cargo');
            $table->integer('estado');

            $table->bigInteger('codDepartamento')->unsigned();
            $table->foreign('codDepartamento')->references('codDepartamento')->on('departamento');
            
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
        Schema::dropIfExists('empleado');
    }
}
