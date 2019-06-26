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

    function departamento(){
        return $this->hasOne(Departamentos::class, 'id', 'departamento_id');
    }

    function municipio(){
        return $this->hasOne(Municipios::class, 'id', 'municipio_id');
    }
}
