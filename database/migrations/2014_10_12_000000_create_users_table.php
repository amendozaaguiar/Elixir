<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')
                ->comment('Codigo de usuario');

            $table->string('name')
                ->comment('Alias de usuario');

            $table->string('email')
                ->unique()
                ->comment('Correo electronico');

            $table->timestamp('email_verified_at')
                ->nullable()
                ->comment('Verificacion del email');

            $table->string('password')
                ->comment('Contraseña');

            $table->rememberToken()
                ->comment('Token de autentificacion');

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
        Schema::dropIfExists('users');
    }
}
