<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->bigIncrements('numFactura');
            $table->datetime('fecha_hora_actual');

            $table->bigInteger('codVenta')->unsigned();
            $table->foreign('codVenta')->references('codVenta')->on('venta');

            $table->bigInteger('codCliente')->unsigned();
            $table->foreign('codCliente')->references('codCliente')->on('Cliente');
            
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
        Schema::dropIfExists('factura');
    }
}
