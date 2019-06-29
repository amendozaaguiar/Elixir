<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Cat extends Model implements Auditable
{
    //Auditoria
    use \OwenIt\Auditing\Auditable;

    //Tabla
    protected $table = 'cat';

    //Campos accesibles
    protected $fillable = [
        'nombre', 
        'direccion',
        'email',
        'departamento_id',
        'municipio_id',
        'activo'
    ];

    function departamento(){
        return $this->hasOne(Departamentos::class, 'id', 'departamento_id');
    }

    function municipio(){
        return $this->hasOne(Municipios::class, 'id', 'municipio_id');
    }
}
