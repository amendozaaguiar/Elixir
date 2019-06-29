<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class EvaluacionesAspirantes extends Model implements Auditable
{
    //Auditoria
    use \OwenIt\Auditing\Auditable;

    //Tabla
    protected $table = 'evaluaciones_aspirantes';

    //Campos accesibles
    protected $fillable = [
        'aplicantes_convocatorias_id',
        'pregrado',
        'especialista',
        'magister_esp_medica',
        'doctorado',
        'seminarios_cursos',
        'experiencia_docencia_universitaria',
        'produccion_intelectual',
        'experiencia_profesional',
        'total_hoja_vida',
        'ensayo',
        'prueba_conocimiento',
        'jurado_1',
        'jurado_2',
        'jurado_3',
        'total_entrevista'
    ];

    //Datos del Aplicante
    function aplicante(){
        return $this->hasOne(AplicantesConvocatorias::class, 'id', 'aplicantes_convocatorias_id');
    }
 
}
