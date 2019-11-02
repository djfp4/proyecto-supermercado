<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->bigIncrements('codCompra');

            $table->bigInteger('codUsuario')->unsigned();
            $table->foreign('codUsuario')->references('codUsuario')->on('usuario');

            $table->bigInteger('codProveedor')->unsigned();
            $table->foreign('codProveedor')->references('codProveedor')->on('proveedor');

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
        Schema::dropIfExists('compra');
    }
}
