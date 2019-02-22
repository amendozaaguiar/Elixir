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
            $table->increments('id')
                ->comment('Codigo de la aplicacion a la convocatoria');

            $table->unsignedInteger('detalle_convocatoria_id')
                ->comment('Codigo del detalle la convocatoria');

            $table->unsignedInteger('aspirante_id')
                ->comment('Codigo del aspirante');

            $table->string('hoja_vida')
                ->comment('Url de la hoja de vida');

            $table->boolean('pre_seleccionado')
                ->nullable()
                ->comment('Preseleccionado 1=si / 0=no');  

            $table->text('observaciones')
                ->nullable()
                ->comment('Observaciones de la aplicacion a la convocatoria'); 

            $table->text('temas_presentacion')
                ->nullable()
                ->comment('Tema para la realizacion del ensayo');

            $table->text('lugar_presentacion')
                ->nullable()
                ->comment('Lugar de presentacion de la entrevista');

            $table->dateTime('fecha_hora_presentacion')
                ->nullable()
                ->comment('Fecha y hora de presentacion de la entrevista');

            $table->unsignedInteger('usuario_reviso_id')
                ->nullable()
                ->comment('Codigo del usuario que reviso los convocados');

            $table->unsignedInteger('estado_evalucion_id')
                ->nullable()
                ->comment('Estado en que se encuentra la convocatoria');

            $table->timestamps();
                //->comment('Creacion/Actualizacion del registro');

            $table->softDeletes()
                ->comment('Eliminacion del registro');

            //Foraneas
            $table->foreign('detalle_convocatoria_id')->references('id')->on('detalle_convocatorias');
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
