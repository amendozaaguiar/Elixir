<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convocatorias extends Model
{
    protected $table = 'convocatorias';

    protected $fillable = [
        'id',
        'cat_id',
        'programa_id',
        'curso_id',
        'perfil',
        'requisitos',
        'activa'
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
