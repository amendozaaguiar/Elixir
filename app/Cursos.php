<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Cursos extends Model implements Auditable
{
    //Auditoria
    use \OwenIt\Auditing\Auditable;
    
    //Tabla
    protected $table = 'cursos';

    //Campos accesibles
    protected $fillable = [
        'id',
        'programa_id',
        'nombre',
        'activo'
    ];

    //Programa
    public function programa()
    {
        return $this->hasOne(Programas::class, 'id', 'programa_id');
    }
}
