<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluacionesConvocatorias extends Model
{
    //Tabla
    protected $table = 'evaluaciones_convocatorias';

    //Campos accesibles
    protected $fillable = [
        'id',
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
}
