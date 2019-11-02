<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleRol', function (Blueprint $table) {
            $table->bigIncrements('codDetalleRol');

            $table->bigInteger('codRoles')->unsigned();
            $table->foreign('codRoles')->references('codRoles')->on('roles');

            $table->bigInteger('codUsuario')->unsigned();
            $table->foreign('codUsuario')->references('codUsuario')->on('usuario');

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
        Schema::dropIfExists('detalleRol');
    }
}
