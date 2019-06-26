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
                ->comment('Código del detalle de la convocatoria');

            $table->unsignedInteger('convocatoria_id')
                ->comment('Código de la convocatoria');

            $table->unsignedInteger('cat_id')
                ->comment('Código del CAT');

            $table->unsignedInteger('programa_id')
                ->comment('Código del programa');

            $table->unsignedInteger('curso_id')
                ->comment('Código del curso');

            $table->text('perfil')
                ->comment('Perfil de la convocatoria');

            $table->text('requisitos')
                ->comment('Requisitos de la convocatoria');

            $table->timestamps();

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
