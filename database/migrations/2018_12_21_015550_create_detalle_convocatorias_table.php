<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleConvocatoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_convocatorias', function (Blueprint $table) {
            $table->increments('id')
                ->comment('Codigo del detalle de la convocatoria');

            $table->unsignedInteger('convocatoria_id')
                ->comment('Codigo de la convocatoria');

            $table->unsignedInteger('cat_id')
                ->comment('Codigo del CAT');

            $table->unsignedInteger('programa_id')
                ->comment('Codigo del programa');

            $table->unsignedInteger('curso_id')
                ->comment('Codigo del curso');

            $table->text('perfil')
                ->comment('Perfil de la convocatoria');

            $table->text('requisitos')
                ->comment('Requisitos de la convocatoria');

            $table->timestamps();
                //->comment('Creacion/Actualizacion del registro');

            $table->softDeletes()
                ->comment('Eliminacion del registro');

            //Foraneas
            $table->foreign('convocatoria_id')->references('id')->on('convocatorias');
            $table->foreign('cat_id')->references('id')->on('cat');
            $table->foreign('programa_id')->references('id')->on('programas');
            $table->foreign('curso_id')->references('id')->on('cursos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_convocatorias');
    }
}
