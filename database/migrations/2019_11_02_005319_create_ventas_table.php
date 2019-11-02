<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->bigIncrements('codVenta');

            $table->bigInteger('codUsuario')->unsigned();
            $table->foreign('codUsuario')->references('codUsuario')->on('usuario');

            $table->bigInteger('codCliente')->unsigned();
            $table->foreign('codCliente')->references('codCliente')->on('cliente');
            
            $table->integer('estado');
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
        Schema::dropIfExists('ventas');
    }
}
