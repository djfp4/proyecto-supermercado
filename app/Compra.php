<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = ['estado'];

    public function scopeFecha($query, $fecha1, $fecha2){
    	if ($fecha1 && $fecha2) {
    		return $query->where('fecha_actual','>=', $fecha1)
    					 ->where('fecha_actual','<=', $fecha2);
    	}

    }

    public function scopeProveedorId($query, $proveedor){
    	if ($proveedor) {
    		if ($proveedor!=0) {
    			return $query->where('proveedor_id',$proveedor);
    		}
    	}
    }
}
