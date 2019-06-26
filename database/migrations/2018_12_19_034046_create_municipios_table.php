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
            $table->increments('id')
                ->comment('Código del municipio');
                
            $table->unsignedInteger('departamento_id')
                ->comment('Código del departamento al que pertenece');

            $table->string('codigo_divipola',3)
                ->comment('Código de la divipola del municipio');

            $table->string('nombre',50)
                ->comment('Nombre del municipio');    

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
