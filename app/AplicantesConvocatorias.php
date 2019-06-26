<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AplicantesConvocatorias extends Model
{    
    //tabla
    protected $table = 'aplicantes_convocatorias';

    //Campos accesibles
    protected $fillable = [
        'detalle_convocatoria_id',
        'aspirante_id',
        'pre_seleccionado',
        'observaciones',
        'temas_presentacion',
        'lugar_presentacion',
        'fecha_hora_presentacion',
        'usuario_reviso_id',
    ];

    function usuario(){
        return $this->hasOne(User::class, 'id', 'aspirante_id');
    }

    function detalleConvocatoria(){
        return $this->hasOne(DetalleConvocatorias::class, 'id', 'detalle_convocatoria_id');
    }

    function evaluacion(){
        return $this->hasOne(EvaluacionesAspirantes::class, 'aplicantes_convocatorias_id', 'id');
    }
}
