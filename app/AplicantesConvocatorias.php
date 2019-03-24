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
        'hoja_vida'
    ];

    function usuario(){
        return $this->hasOne(User::class, 'id', 'aspirante_id');
    }
}
