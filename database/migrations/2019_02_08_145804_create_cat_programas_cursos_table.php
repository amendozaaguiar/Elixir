<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatProgramasCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_programas_cursos', function (Blueprint $table) {
            $table->increments('id')
                ->comment('Codigo del registro de cat y programas y cursos');

            $table->unsignedInteger('cat_id')
                ->comment('Codigo del CAT');

            $table->unsignedInteger('programa_id')
                ->comment('Codigo del programa');

            $table->unsignedInteger('curso_id')
                ->comment('Codigo del curso');

            $table->timestamps();
                //->comment('Creacion/Actualizacion del registro');

            $table->softDeletes()
                ->comment('Eliminacion del registro');

            //Foraneas
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
        Schema::dropIfExists('cat_programas_cursos');
    }
}
