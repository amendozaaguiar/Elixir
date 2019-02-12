<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_documento', function (Blueprint $table) {
            $table->increments('id')
                ->comment('Codigo del tipo de documento');

            $table->string('descripcion',50)
                ->comment('Descripcion');

            $table->boolean('activo')
                ->default(1)
                ->comment('Activo');

            $table->timestamps();
                //->comment('Creacion/Actualizacion del registro');

            $table->softDeletes()
                ->comment('Eliminacion del registro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::dropIfExists('tipos_documento');

    }
}
