<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{   
	//Tabla
    protected $table = 'municipios';

    //Campos accesibles
    protected $fillable = [
        'id_departamento',
        'codigo_divipola',
        'nombre'
    ];
}
