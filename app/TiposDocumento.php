<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class TiposDocumento extends Model implements Auditable
{   
	//Auditoria
	use \OwenIt\Auditing\Auditable;
	
    //Tabla
    protected $table = 'tipos_documento';

    //Campos accesibles
    protected $fillable = [
        'id',
        'descripcion',
    ];
}
