<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Programas extends Model implements Auditable
{
	//Auditoria
	use \OwenIt\Auditing\Auditable;

	//Tabla    
    protected $table = 'programas';

    //Campos accesibles
    protected $fillable = [
        'id',
        'nombre',
        'activo'
    ];
}
