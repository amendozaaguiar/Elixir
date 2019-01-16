<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipos_Documento extends Model
{
	//Eliminacion logica
    use SoftDeletes;
    
    protected $table = 'tipos_documento';

    protected $fillable = [
        'id',
        'descripcion',
    ];
}
