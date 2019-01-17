<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cat extends Model
{
	//Eliminacion logica
	use SoftDeletes;

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
