<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['nombre','total','cant_x_lote','precio_compra','precio_venta','estado','categoria_id'];
}
