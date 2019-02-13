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
            $table->increments('id')
                ->comment('Codigo de la convocatoria');

            $table->text('descripcion')
                ->comment('Descripcion de la convocatoria');

            $table->date('fecha_inicio')
                ->comment('fecha de inicio de la convocatoria');

            $table->date('fecha_finalizacion')
                ->comment('fecha de finalizacion de la convocatoria');

            $table->boolean('activa')
                ->default(1)
                ->comment('Activa');

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
        Schema::dropIfExists('convocatorias');
    }
}
