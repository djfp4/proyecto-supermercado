<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleVenta', function (Blueprint $table) {
            $table->bigIncrements('codDetalleVenta');

            $table->bigInteger('codVenta')->unsigned();
            $table->foreign('codVenta')->references('codVenta')->on('venta');

            $table->bigInteger('codProducto')->unsigned();
            $table->foreign('codProducto')->references('codProducto')->on('producto');

            $table->integer('cantidad');
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
        Schema::dropIfExists('detalleVentas');
    }
}
