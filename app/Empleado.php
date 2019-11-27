<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Empleado;
use App\User;
use App\Auth;

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

	 public function verificar(){
        $user=Auth::user();

        if (isset($user)!=null) {
            if ($user->verificarCargo()!=1) {
                return view('/home');   
            }else{
                return view('/home');
            }
        }
    }
}
