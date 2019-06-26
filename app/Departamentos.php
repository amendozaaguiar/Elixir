<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{   
	//Tabla
    protected $table = 'departamentos';

    //Campos accesibles
    protected $fillable = [
        'codigo_divipola',
        'nombre'
    ];
}
