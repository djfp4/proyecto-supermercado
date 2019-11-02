<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleCompra', function (Blueprint $table) {
            $table->bigIncrements('codDetalleCompra');

            $table->bigInteger('codCompra')->unsigned();
            $table->foreign('codCompra')->references('codCompra')->on('compra');  
                      
            $table->bigInteger('codProducto')->unsigned();
            $table->foreign('codProducto')->references('codProducto')->on('producto');

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
        Schema::dropIfExists('detalleCompra');
    }
}
