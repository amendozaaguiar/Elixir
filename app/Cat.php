<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $table = 'cat';

    protected $fillable = [
        'nombre', 
        'direccion',
        'email',
        'departamento_id',
        'municipio_id',
        'activo'
    ];
}
