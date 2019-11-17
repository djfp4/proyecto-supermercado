<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable=["nombre","descripcion"];

    public function empleado(){

    	return $this->hasOne("App\Empleado");
    }
}
