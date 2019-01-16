<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipos_Documento extends Model
{
    protected $table = 'tipos_documento';

    protected $fillable = [
        'id',
        'descripcion',
    ];
}
