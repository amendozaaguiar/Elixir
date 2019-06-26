<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convocatorias extends Model
{    
    //Tabla
    protected $table = 'convocatorias';

    //Campos accesibles
    protected $fillable = [
        'id',
        'descripcion',
        'fecha_inicio',
        'fecha_finalizacion',
        'activa'
    ];

    //Detalle de la convocatoria
    public function detalleConvocatoria(){
        return $this->hasMany(DetalleConvocatorias::class, 'convocatoria_id', 'id');
    }

    //Aspirantes
    public function aspirantes()
    {
        return $this->hasManyThrough(
            'App\AplicantesConvocatorias',
            'App\DetalleConvocatorias',    
            'convocatoria_id',
            'detalle_convocatoria_id',
            'id',
            'id'
        );
    }


}
