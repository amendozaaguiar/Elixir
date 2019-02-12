<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            
            $table->increments('id')
                ->comment('Codigo del curso');
            
            $table->unsignedInteger('programa_id')
                ->comment('Codigo del programa al que pertenece');
            
            $table->string('nombre',50)
                ->comment('Nombre del curso');

            $table->text('perfil')
                ->dafault('')
                ->comment('Perfil que se requier para el programa');
            
            $table->boolean('activo')
                ->default(1)
                ->comment('Activo');

            $table->timestamps();
                //->comment('Creacion/Actualizacion del registro');

            $table->softDeletes()
                ->comment('Eliminacion del registro');
            
            //Foraneas
            $table->foreign('programa_id')->references('id')->on('programas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
