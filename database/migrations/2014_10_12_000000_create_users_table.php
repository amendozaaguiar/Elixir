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
            $table->bigIncrements('id')
                ->comment('Código de usuario');

            $table->string('name')
                ->comment('Alias de usuario');

            $table->string('email')
                ->unique()
                ->comment('Correo electrónico');

            $table->timestamp('email_verified_at')
                ->nullable()
                ->comment('Verificación del correo electrónico');

            $table->string('password')
                ->comment('Contraseña');

            $table->rememberToken()
                ->comment('Token de autentificación');

            $table->timestamps();
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
