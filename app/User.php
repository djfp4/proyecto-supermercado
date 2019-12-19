<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
 
    //protected $table = "usuarios";

    protected $fillable = [
        'name', 'password', 'empleado_id', 'cargo_id', 
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cargo(){
        return $this->belongsTo('App\Cargo');
    }

    public function verificarCargo(){
        switch ($this->cargo->descripcion) {
            
            case 'Administrador de ventas':
                    return 1;
                break;

            case 'Cajero':
                    return 2;
                break;

            case 'Administrador de inventario':
                    return 3;
                break;

            case 'Administrador de recursos humanos':
                    return 4;
                break;

            case 'Gerente':
                    return 5;
                break;

            default:
                return 0;
                break;
        }

    }

    Public function hasRole ($s) 
    { 
        if ($this->cargo()->where( 'descripcion', $s)->first()) {
            return true; 
        } 
        return false; 
    }
}
