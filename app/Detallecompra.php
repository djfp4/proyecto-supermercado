<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detallecompra extends Model
{
    protected $fillable = ['lotes','cant_x_lote','precio_compra','precio_venta','estado'];
}
