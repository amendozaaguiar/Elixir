<?php

use Illuminate\Database\Seeder;

class CatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Usario administrador
        DB::table('cat')->insert([
        	[
        		'nombre' => 'APARTADÓ',
            	'departamento_id' => '1',
            	'municipio_id' => '13',
            	'direccion' => 'COLEGIO SAN PEDRO CLAVER, AVENIDA 103 No. 81-30, APARTADO',
        		'email' => 'curaba@ut.edu.co'
        	],
        	[
        		'nombre' => 'BARRANQUILLA',
            	'departamento_id' => '2',
            	'municipio_id' => '126',
            	'direccion' => 'INSTITUCIÓN DISTRITAL FUNDACIÓN PIES DESCALZOS. CORREGIMIENTO EDUARDO SANTOS – LA PLAYA',
        		'email' => 'cbarranquilla@ut.edu.co '
        	],
        	[
        		'nombre' => 'BOGOTÁ',
            	'departamento_id' => '3',
            	'municipio_id' => '149',
            	'direccion' => 'Calle 69 No. 9-36 SECTOR QUINTA CAMACHO',
        		'email' => 'cbogota@ut.edu.co'
        	],
        	[
        		'nombre' => 'CALI',
            	'departamento_id' => '24',
            	'municipio_id' => '1004',
            	'direccion' => 'Institución Educativa Juana de Caicedo y Cuero. Calle 1 oeste 50-85 Barrio el Lido',
        		'email' => 'ccali@ut.edu.co'
        	],
        	[
        		'nombre' => 'CHAPARRAL',
            	'departamento_id' => '23',
            	'municipio_id' => '967',
            	'direccion' => 'CERES DARIO ECHANDIA OLAYA - Barrio Tuluní',
        		'email' => 'cchaparr@ut.edu.co'
        	],
        	[
        		'nombre' => 'IBAGUÉ',
            	'departamento_id' => '23',
            	'municipio_id' => '957',
            	'direccion' => 'Universidad del Tolima. Barrio Santa Helena parte alta. Bloque 31B piso 3, oficina de apoyo académico',
        		'email' => 'docencia.idead@ut.edu.co'
        	],
        	[
        		'nombre' => 'MEDELLÍN',
            	'departamento_id' => '1',
            	'municipio_id' => '1',
            	'direccion' => 'INSTITUCION EDUCATIVA INEM JOSE FELIX DE RESTREPO. Carrera 48 No. 1125 Avenida las Vegas Bloque 7A',
        		'email' => 'cmedellin@ut.edu.co'
        	],
        	[
        		'nombre' => 'MOCOA',
            	'departamento_id' => '27',
            	'municipio_id' => '1072',
            	'direccion' => 'I. E FRAY PLACIDO Sede Los Sauces Barrio Los Sauces',
        		'email' => 'cmocoa@ut.edu.co'
        	],
        	[
        		'nombre' => 'NEIVA',
            	'departamento_id' => '13',
            	'municipio_id' => '603',
            	'direccion' => 'Inem Julian Motta Salas.  Cra 1 No. 26 A -01',
        		'email' => 'chuila@ut.edu.co'
        	],
        	[
        		'nombre' => 'PEREIRA',
            	'departamento_id' => '20',
            	'municipio_id' => '830',
            	'direccion' => 'Escuela Normal Superior "El Jardín" de Risaralda. Calle 23 #  13 - 42 Barrio El Jardín Av Sur',
        		'email' => 'cpereira@ut.edu.co'
        	],
        	[
        		'nombre' => 'POPAYAN',
            	'departamento_id' => '8',
            	'municipio_id' => '362',
            	'direccion' => 'Colegio INEM Francisco José de Caldas. Transversal novena 3N -02 Barrio Villa Paula, diagonal terminal',
        		'email' => 'cpopayan@ut.edu.co'
        	],
        	[
        		'nombre' => 'PURIFICACION',
            	'departamento_id' => '23',
            	'municipio_id' => '991',
            	'direccion' => 'INSTITUCIÓN EDUCATIVA TÉCNICA PEREZ Y ALDANA Kilometro 1 vía Saldaña',
        		'email' => 'cpuri@ut.edu.co'
        	],
        	[
        		'nombre' => 'SIBATÉ',
            	'departamento_id' => '11',
            	'municipio_id' => '540',
            	'direccion' => 'Sede Administrativa CALLE 10 No. 6-57 PISO 2',
        		'email' => 'csibate@ut.edu.co'
        	],
            
        ]);
    }
}
