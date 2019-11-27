<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nombre','paterno','materno','ci_nit','usuario_id'];
}
