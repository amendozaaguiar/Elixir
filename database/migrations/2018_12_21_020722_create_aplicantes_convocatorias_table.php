<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAplicantesConvocatoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aplicantes_convocatorias', function (Blueprint $table) {
            $table->increments('id');            
            $table->unsignedInteger('convocatoria_id')
                ->comment('Codigo de la convocatoria');            
            $table->unsignedInteger('aspirante_id')
                ->comment('Codigo del aspirante');            
            $table->string('hoja_vida',50)
                ->comment('url de la hoja de vida');            
            $table->boolean('pre_seleccionado')
                ->comment('Preseleccionado 1=si / 0=no')
                ->default(1);            
            $table->text('observaciones')
                ->comment('observaciones de la aplicacion a la convocatoria');            
            $table->text('temas_presentacion')
                ->comment('tema para la realizacion del ensayo');            
            $table->text('lugar_presentacion')
                ->comment('lugar de presentacion');            
            $table->dateTime('fecha_hora_presentacion')
                ->comment('Fecha y hora de presentacion');
            $table->unsignedInteger('usuario_reviso_id')
                ->comment('Codigo del usuario que reviso los convocados');
            $table->unsignedInteger('estado_evalucion_id')
                ->comment('Estado en que se encuentra la convocatoria');            
            $table->timestamps();
            $table->softDeletes();

            //Foraneas
            $table->foreign('convocatoria_id')->references('id')->on('convocatorias');
            $table->foreign('aspirante_id')->references('id')->on('users');
            $table->foreign('usuario_reviso_id')->references('id')->on('users');
            $table->foreign('estado_evalucion_id')->references('id')->on('estados_evaluacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aplicantes_convocatorias');
    }
}
