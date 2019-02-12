<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_detail', function (Blueprint $table) {
            $table->increments('id')
                ->comment('Codigo del detalle del usuario');

            $table->unsignedInteger('user_id')                
                ->default('1')
                ->comment('Codigo de Usuario');

            $table->unsignedInteger('tipo_documento_id')                
                ->default('1')
                ->comment('Codigo del Tipo de documento');

            $table->string('numero_documento',25)
                ->comment('Numero de documento');

            $table->string('primer_nombre',50)
                ->comment('Primer Nombre');

            $table->string('segundo_nombre',50)                
                ->nullable()
                ->comment('Segundo Nombre');

            $table->string('primer_apellido',50)
                ->comment('Primer Apellido');

            $table->string('segundo_apellido',50)                
                ->nullable()
                ->comment('Segundo Apellido');     

            $table->timestamps();
                //->comment('Creacion/Actualizacion del registro');

            $table->softDeletes()
                ->comment('Eliminacion del registro');

            //Llaves foraneas
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tipo_documento_id')->references('id')->on('tipos_documento');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_detail');
    }
}
