<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cursos extends Model
{
    //Eliminacion logica
    use SoftDeletes;
    
    protected $table = 'cursos';

    protected $fillable = [
        'id',
        'programa_id',
        'nombre',
        'perfil',
        'activo'
    ];

    public function programa()
    {
        return $this->hasOne(Programas::class, 'id', 'programa_id');
    }
}
