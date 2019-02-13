<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Convocatorias extends Model
{
    //Eliminacion logica
    use SoftDeletes;
    
    protected $table = 'convocatorias';

    protected $fillable = [
        'id',
        'descripcion',
        'fecha_inicio',
        'fecha_finalizacion',
        'activa'
    ];
}
