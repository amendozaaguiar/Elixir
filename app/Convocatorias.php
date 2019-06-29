<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Convocatorias extends Model implements Auditable
{    
    //Auditoria
    use \OwenIt\Auditing\Auditable;
    
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
