<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable=[
    	"nombre",
	    "paterno",
	    "materno",
	    "fecha_nac",
	    "telefono",
	    "zona",
	    "avenida",
	    "nro",
	    "cargo",
	    "estado",
	    "departamento_id"
	];
}
