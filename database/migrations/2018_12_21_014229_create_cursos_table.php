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
                ->comment('Código del curso');
            
            $table->unsignedInteger('programa_id')
                ->comment('Código del programa al que pertenece');
            
            $table->string('nombre',50)
                ->comment('Nombre del curso');
            
            $table->boolean('activo')
                ->default(1)
                ->comment('Activo');

            $table->timestamps();
            
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
