<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Departamentos extends Model implements Auditable
{   
	//Auditoria
    use \OwenIt\Auditing\Auditable;
    
	//Tabla
    protected $table = 'departamentos';

    //Campos accesibles
    protected $fillable = [
        'codigo_divipola',
        'nombre'
    ];
}
