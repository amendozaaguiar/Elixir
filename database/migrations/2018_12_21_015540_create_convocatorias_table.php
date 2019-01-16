<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConvocatoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convocatorias', function (Blueprint $table) {
            
            $table->increments('id');
            
            $table->unsignedInteger('cat_id')
                ->comment('Codigo del CAT');
            
            $table->unsignedInteger('programa_id')
                ->comment('Codigo del programa');
            
            $table->unsignedInteger('curso_id')
                ->comment('Codigo del curso');
            
            $table->string('perfil')
                ->dafault('')
                ->comment('perfil de la convocatoria');
            $table->string('requisitos')
                ->dafault('')
                ->comment('Requisitos de la convocatoria');
            
            $table->boolean('activa')->default(1);    
            $table->softDeletes();
            $table->timestamps();

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
        Schema::dropIfExists('convocatorias');
    }
}
