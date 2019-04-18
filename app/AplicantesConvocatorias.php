<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AplicantesConvocatorias extends Model
{
     //Eliminacion logica
    use SoftDeletes;
    
    protected $table = 'aplicantes_convocatorias';

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
}
