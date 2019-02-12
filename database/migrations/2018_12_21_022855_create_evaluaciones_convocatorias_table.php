<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacionesConvocatoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //computar eentre total entrevista y hv para dar el total Final
        Schema::create('evaluaciones_convocatorias', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('aplicantes_convocatorias_id')
                ->comment('Codigo de la aspiracion a la convocatoria');
            
            $table->unsignedDecimal('pregado', 3, 2)
                ->comment('Título pregrado ( 4 puntos)');
            
            $table->unsignedDecimal('especialista', 3, 2)
                ->comment('Título especialista ( Hasta 6 puntos) No titulado 1 punto por cada semestre hasta 3 puntos');
            
            $table->unsignedDecimal('magister_esp_medica', 3, 2)
                ->comment('Título magister o especialización médica(Hasta 8 puntos) No titulado 1,5 por cada semestre,  Hasta 6 puntos');
            
            $table->unsignedDecimal('doctorado', 3, 2)
                ->comment('Título de doctorado (Hasta 12 puntos) No titulado,  2 punto por cada semestre hasta 8');
            
            $table->unsignedDecimal('seminarios_cursos', 3, 2)
                ->comment('Seminario Docencia Distancia UniTolima y cursos en el área de pedagogía (Hasta 2 puntos)  0,5 por cada 60 horas');
            
            $table->unsignedDecimal('experiencia_docencia_universitaria', 3, 2)
                ->comment('Experiencia docencia universitaria (Hasta 10 puntos) 2 punto por cada 120 horas semestrales');
            
            $table->unsignedDecimal('produccion_intelectual', 3, 2)
                ->comment('Producción intelectual (Hasta 6 puntos)');
            
            $table->unsignedDecimal('experiencia_profesional', 3, 2)
                ->comment('Experiencia Profesional (Hasta 4 puntos) 2 puntos por cada año de experiencia');
            
            $table->unsignedDecimal('total_hoja_vida', 3, 2)
                ->comment('calificacion hoja de vida');
            
            $table->unsignedDecimal('ensayo', 3, 2)
                ->comment('calificacion ensayo');
            
            $table->unsignedDecimal('prueba_conocimiento', 3, 2)
                ->comment('calificacion prueba de conocimiento');
            
            $table->unsignedDecimal('jurado_1', 3, 2)
                ->comment('calificacion jurado 1');
            
            $table->unsignedDecimal('jurado_2', 3, 2)
                ->comment('calificacion jurado 2');

            $table->unsignedDecimal('jurado_3', 3, 2)
                ->comment('calificacion jurado 3');

            $table->unsignedDecimal('total_entrevista', 3, 2)
                ->comment('calificacion jurado 2');

            $table->timestamps();
            $table->softDeletes();

            //Foraneas
            $table->foreign('aplicantes_convocatorias_id')->references('id')->on('aplicantes_convocatorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluaciones_convocatorias');
    }
}
