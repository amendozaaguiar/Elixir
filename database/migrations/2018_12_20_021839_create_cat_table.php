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
            $table->increments('id');
            $table->string('nombre',50)
                ->dafault('')
                ->comment('Nombre del CAT');
            $table->string('direccion')
                ->dafault('')
                ->comment('Direccion del CAT');
            $table->string('email')
                ->dafault('')
                ->comment('email contacto del CAT');
            $table->unsignedInteger('departamento_id')
                ->comment('Codigo del departamento al que pertenece');

            $table->unsignedInteger('municipio_id')
                ->comment('Codigo del departamento al que pertenece');
            
            $table->boolean('activo')->default(1);
            $table->timestamps();

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
