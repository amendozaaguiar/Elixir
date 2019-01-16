<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Programas extends Model
{
    //Eliminacion logica
    use SoftDeletes;
    
    protected $table = 'programas';

    protected $fillable = [
        'id',
        'nombre',
        'activo'
    ];

    public function cursos()
    {
        return $this->hasMany(Cursos::class, 'programa_id', 'id');
    }
}
