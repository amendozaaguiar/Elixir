<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('departamento_id')
                ->comment('Codigo del departamento al que pertenece');
            $table->string('codigo_divipola',3)->comment('Codigo de la divipola del municipio');
            $table->string('nombre',50)
                ->dafault('')
                ->comment('Nombre del municipio');
            $table->softDeletes();
            $table->timestamps();

            //Foraneas
            $table->foreign('departamento_id')->references('id')->on('departamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipios');
    }
}
