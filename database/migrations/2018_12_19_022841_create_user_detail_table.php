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
            $table->increments('id');
            $table->unsignedInteger('user_id')
                ->comment('Codigo de Usuario')
                ->default('1');
            $table->unsignedInteger('tipo_documento_id')
                ->comment('Tipo de documento')
                ->default('1');
            $table->string('numero_documento',25)
                ->comment('Numero de documento')
                ->nullable();
            $table->string('primer_nombre',25)
                ->comment('Primer Nombre')
                ->nullable();
            $table->string('segundo_nombre',25)
                ->comment('segundo Nombre')
                ->nullable();
            $table->string('primer_apellido',25)
                ->comment('Primer Apellido')
                ->nullable();
            $table->string('segundo_apellido',25)
                ->comment('segundo Apellido')
                ->nullable();            
            $table->timestamps();
            $table->softDeletes();

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
