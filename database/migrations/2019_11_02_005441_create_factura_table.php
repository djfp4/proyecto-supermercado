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
        Schema::create('cliente_venta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('fecha_hora_actual');

            $table->bigInteger('venta_id')->unsigned();

            $table->bigInteger('cliente_id')->unsigned();
            
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
        Schema::dropIfExists('cliente_venta');
    }
}
