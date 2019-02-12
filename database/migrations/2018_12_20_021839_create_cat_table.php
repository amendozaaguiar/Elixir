<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat', function (Blueprint $table) {
            $table->increments('id')
                ->comment('Codigo del CAT');

            $table->string('nombre',50)
                ->comment('Nombre del CAT');

            $table->text('direccion')
                ->comment('Direccion del CAT');

            $table->string('email',50)
                ->dafault('')
                ->comment('Email contacto del CAT');

            $table->unsignedInteger('departamento_id')
                ->comment('Codigo del departamento al que pertenece');

            $table->unsignedInteger('municipio_id')
                ->comment('Codigo del municipio al que pertenece');   

            $table->boolean('activo')
                ->default(1)
                ->comment('Activo'); 

            $table->timestamps();
                //->comment('Creacion/Actualizacion del registro');

            $table->softDeletes()
                ->comment('Eliminacion del registro');

            //Foarenas
            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->foreign('municipio_id')->references('id')->on('municipios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat');
    }
}
