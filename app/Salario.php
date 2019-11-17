<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salario extends Model
{
    protected $fillable = ['salario','descuentos','afp','empleado_id'];
}
