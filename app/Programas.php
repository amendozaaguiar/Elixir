<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programas extends Model
{
	//Tabla    
    protected $table = 'programas';

    //Campos accesibles
    protected $fillable = [
        'id',
        'nombre',
        'activo'
    ];
}
