<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TiposDocumento extends Model
{
	//Eliminacion logica
    use SoftDeletes;
    
    //Tabla
    protected $table = 'tipos_documento';

    //Campos accesibles
    protected $fillable = [
        'id',
        'descripcion',
    ];
}
