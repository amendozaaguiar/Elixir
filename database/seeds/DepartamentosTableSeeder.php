<?php

use Illuminate\Database\Seeder;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Departamentos
        DB::table('departamentos')->insert([
        	['codigo_divipola' => '05' , 'nombre' => 'ANTIOQUIA'],
            ['codigo_divipola' => '08' , 'nombre' => 'ATLANTICO'],
        	['codigo_divipola' => '11' , 'nombre' => 'BOGOTA'],
        	['codigo_divipola' => '13' , 'nombre' => 'BOLIVAR'],
        	['codigo_divipola' => '15' , 'nombre' => 'BOYACA'],           
        	['codigo_divipola' => '17' , 'nombre' => 'CALDAS'],
        	['codigo_divipola' => '18' , 'nombre' => 'CAQUETA'],
        	['codigo_divipola' => '19' , 'nombre' => 'CAUCA'],
        	['codigo_divipola' => '20' , 'nombre' => 'CESAR'],
        	['codigo_divipola' => '23' , 'nombre' => 'CORDOBA'],
        	['codigo_divipola' => '25' , 'nombre' => 'CUNDINAMARCA'],
        	['codigo_divipola' => '27' , 'nombre' => 'CHOCO'],
        	['codigo_divipola' => '41' , 'nombre' => 'HUILA'],
        	['codigo_divipola' => '44' , 'nombre' => 'LA GUAJIRA'],
        	['codigo_divipola' => '47' , 'nombre' => 'MAGDALENA'],
        	['codigo_divipola' => '50' , 'nombre' => 'META'],
        	['codigo_divipola' => '52' , 'nombre' => 'NARIÑO'],
        	['codigo_divipola' => '54' , 'nombre' => 'N. DE SANTANDER'],
        	['codigo_divipola' => '63' , 'nombre' => 'QUINDIO'],
        	['codigo_divipola' => '66' , 'nombre' => 'RISARALDA'],
        	['codigo_divipola' => '68' , 'nombre' => 'SANTANDER'],
        	['codigo_divipola' => '70' , 'nombre' => 'SUCRE'],
        	['codigo_divipola' => '73' , 'nombre' => 'TOLIMA'],
        	['codigo_divipola' => '76' , 'nombre' => 'VALLE DEL CAUCA'],
        	['codigo_divipola' => '81' , 'nombre' => 'ARAUCA'],
        	['codigo_divipola' => '85' , 'nombre' => 'CASANARE'],
        	['codigo_divipola' => '86' , 'nombre' => 'PUTUMAYO'],
        	['codigo_divipola' => '88' , 'nombre' => 'SAN ANDRES'],
        	['codigo_divipola' => '91' , 'nombre' => 'AMAZONAS'],
        	['codigo_divipola' => '94' , 'nombre' => 'GUAINIA'],
        	['codigo_divipola' => '95' , 'nombre' => 'GUAVIARE'],
        	['codigo_divipola' => '97' , 'nombre' => 'VAUPES'],
        	['codigo_divipola' => '99' , 'nombre' => 'VICHADA'],
        ]);
    }
}
