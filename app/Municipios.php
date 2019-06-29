<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Municipios extends Model implements Auditable
{   
	//Auditoria
    use \OwenIt\Auditing\Auditable;

	//Tabla
    protected $table = 'municipios';

    //Campos accesibles
    protected $fillable = [
        'id_departamento',
        'codigo_divipola',
        'nombre'
    ];
}
