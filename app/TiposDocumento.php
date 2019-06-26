<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposDocumento extends Model
{    
    //Tabla
    protected $table = 'tipos_documento';

    //Campos accesibles
    protected $fillable = [
        'id',
        'descripcion',
    ];
}
