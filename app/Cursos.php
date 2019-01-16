<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $table = 'cursos';

    protected $fillable = [
        'id',
        'programa_id',
        'nombre',
        'activo'
    ];

    public function programa()
    {
        return $this->belongsTo(Programas::class, 'id', 'programa_id');
    }
}
