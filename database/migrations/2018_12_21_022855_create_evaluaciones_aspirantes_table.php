<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacionesAspirantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //computar entre total entrevista y hv para dar el total Final
        Schema::create('evaluaciones_aspirantes', function (Blueprint $table) {
            $table->increments('id')
                ->comment('Código de la evaluacion de la convocatoria');
            
            $table->unsignedInteger('aplicantes_convocatorias_id')
                ->comment('Código de la aspiracion a la convocatoria');
            
            $table->unsignedDecimal('pregrado', 4, 2)
                ->nullable()
                ->comment('Título pregrado ( 4 puntos)');
            
            $table->unsignedDecimal('especialista', 4, 2)
                ->nullable()
                ->comment('Título especialista ( Hasta 6 puntos) No titulado 1 punto por cada semestre hasta 3 puntos');
            
            $table->unsignedDecimal('magister_esp_medica', 4, 2)
                ->nullable()
                ->comment('Título magister o especialización médica(Hasta 8 puntos) No titulado 1,5 por cada semestre,  Hasta 6 puntos');
            
            $table->unsignedDecimal('doctorado', 4, 2)
                ->nullable()
                ->comment('Título de doctorado (Hasta 12 puntos) No titulado,  2 punto por cada semestre hasta 8');
            
            $table->unsignedDecimal('seminarios_cursos', 4, 2)
                ->nullable()
                ->comment('Seminario Docencia Distancia UniTolima y cursos en el área de pedagogía (Hasta 2 puntos)  0,5 por cada 60 horas');
            
            $table->unsignedDecimal('experiencia_docencia_universitaria', 4, 2)
                ->nullable()
                ->comment('Experiencia docencia universitaria (Hasta 10 puntos) 2 punto por cada 120 horas semestrales');
            
            $table->unsignedDecimal('produccion_intelectual', 4, 2)
                ->nullable()
                ->comment('Producción intelectual (Hasta 6 puntos)');
            
            $table->unsignedDecimal('experiencia_profesional', 4, 2)
                ->nullable()
                ->comment('Experiencia Profesional (Hasta 4 puntos) 2 puntos por cada año de experiencia');
            
            $table->unsignedDecimal('total_hoja_vida', 4, 2)
                ->nullable()
                ->comment('Calificacion hoja de vida');
            
            $table->unsignedDecimal('ensayo', 4, 2)
                ->nullable()
                ->comment('Calificacion ensayo');
            
            $table->unsignedDecimal('prueba_conocimiento', 4, 2)
                ->nullable()
                ->comment('Calificacion prueba de conocimiento');

            $table->timestamps();

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
        Schema::dropIfExists('evaluaciones_aspirantes');
    }
}
