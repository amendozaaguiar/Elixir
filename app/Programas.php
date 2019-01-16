<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programas extends Model
{
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
