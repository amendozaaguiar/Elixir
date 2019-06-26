<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
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
