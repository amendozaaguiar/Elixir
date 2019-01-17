<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{   
    protected $table = 'Departamentos';

    protected $fillable = [
        'codigo_divipola',
        'nombre'
    ];
}
