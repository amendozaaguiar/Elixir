<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadosEvaluacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados_evaluacion', function (Blueprint $table) {
            $table->increments('id')
                ->comment('Codigo del estado de la evaluacion');

            $table->string('descripcion',50)
                ->comment('Descripcion del estado de la evaluacion de los postulantes'); 

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
        Schema::dropIfExists('estados_evaluacion');
    }
}
