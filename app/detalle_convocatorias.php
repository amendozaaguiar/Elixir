<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class detalle_convocatorias extends Model
{
	//Eliminacion logica
    use SoftDeletes;

    protected $table = 'detalle_convocatorias';

    protected $fillable = [
        'id',
        'convocatoria_id',
        'cat_id',
        'programa_id',
        'curso_id',
        'perfil',
        'requisitos'
    ];
    
    function cat(){
        return $this->hasOne(CAT::class, 'id', 'cat_id');
    }

    function programa(){
        return $this->hasOne(Programas::class, 'id', 'programa_id');
    }

    function curso(){
        return $this->hasOne(Cursos::class, 'id', 'curso_id');
    }
}
