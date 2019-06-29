<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class DetalleConvocatorias extends Model implements Auditable
{
    //Auditoria
    use \OwenIt\Auditing\Auditable;
    
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

    //Aspirantes
    public function aplicantes()
    {
        return $this->hasMany(AplicantesConvocatorias::class, 'detalle_convocatoria_id', 'id');
    }    

    //Convocatoria
    function convocatoria()
    {
        return $this->hasOne(Convocatorias::class, 'id', 'convocatoria_id');
    }

    //CATs
    function cat()
    {
        return $this->hasOne(CAT::class, 'id', 'cat_id');
    }

    //Programas
    function programa()
    {
        return $this->hasOne(Programas::class, 'id', 'programa_id');
    }

    //Cursos
    function curso()
    {
        return $this->hasOne(Cursos::class, 'id', 'curso_id');
    }
}
