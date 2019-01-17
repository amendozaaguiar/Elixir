<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{   
    protected $table = 'Municipios';

    protected $fillable = [
        'id_departamento',
        'codigo_divipola',
        'nombre'
    ];
}
