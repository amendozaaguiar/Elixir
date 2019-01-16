<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Departamentos
        $this->call(DepartamentosTableSeeder::class);
        //Municipios
        $this->call(MunicipiosTableSeeder::class);
    	//Tipos de documento
        $this->call(TiposDocumentoTableSeeder::class);
        //CAT de la universidad
        $this->call(CatTableSeeder::class);
        //Permisos de users y roles
        $this->call(PermissionsTableSeeder::class);
        //Usuario del sistema (admin)
        $this->call(UsersTableSeeder::class);
    }
}
