<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Convocatorias extends Model
{
    //Eliminacion logica
    use SoftDeletes;
    
    protected $table = 'convocatorias';

    protected $fillable = [
        'id',
        'descripcion',
        'fecha_inicio',
        'fecha_finalizacion',
        'activa'
    ];

     /**
     * Obtener el detalle de la convocatoria.
     */
    public function detalleConvocatoria(){
        return $this->hasMany(DetalleConvocatorias::class, 'convocatoria_id', 'id');
    }

    /**
     * Obtener los aspirantes.
     */
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
