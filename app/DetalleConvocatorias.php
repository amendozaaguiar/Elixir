<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleConvocatorias extends Model
{
	//Eliminacion logica
    use SoftDeletes;

    //Tabla
    protected $table = 'detalle_convocatorias';

    //Campos accesibles
    protected $fillable = [
        'id',
        'convocatoria_id',
        'cat_id',
        'programa_id',
        'curso_id',
        'perfil',
        'requisitos'
    ];
    

    //Convocatorias
    function convocatoria(){
        return $this->hasOne(Convocatorias::class, 'id', 'convocatoria_id');
    }

    //CAT´s
    function cat(){
        return $this->hasOne(CAT::class, 'id', 'cat_id');
    }

    //Programas
    function programa(){
        return $this->hasOne(Programas::class, 'id', 'programa_id');
    }

    //Cursos
    function curso(){
        return $this->hasOne(Cursos::class, 'id', 'curso_id');
    }
}
