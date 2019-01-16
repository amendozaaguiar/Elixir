<?php

use Illuminate\Database\Seeder;

class TiposDocumentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Tipos de documento
        DB::table('tipos_documento')->insert([
        	['descripcion' => 'CEDULA DE CIUDADANIA', 	'activo' => '1'],
        	['descripcion' => 'TARJETA DE IDENTIDAD', 	'activo' => '1'],
        	['descripcion' => 'CEDULA DE EXTRANJERIA', 	'activo' => '1'],
        	['descripcion' => 'PASAPORTE', 				'activo' => '1'],
        	['descripcion' => 'PEP RAMV', 				'activo' => '1'],
        ]);
    }
}
