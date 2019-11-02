<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->bigIncrements('codProducto');
            $table->string('nombre');
            $table->integer('lotes');
            $table->integer('cant_x_lote');
            $table->integer('precio_compra');
            $table->integer('precio_venta');
            $table->integer('estado');
            
            $table->bigInteger('codCategoria')->unsigned();
            $table->foreign('codCategoria')->references('codCategoria')->on('categoria');

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
        Schema::dropIfExists('producto');
    }
}
