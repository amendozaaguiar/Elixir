<?php

use Illuminate\Database\Seeder;

use Caffeinated\Shinobi\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Usario administrador
        DB::table('users')->insert([
            'name'      =>  'administrador',
        	'email'     =>  'admin@admin.com',
            'password'  =>  bcrypt('administrador'),
        ]);
        //Rol admin
        Role::create([
            'name'          => 'Admin',
            'slug'          => 'slug',
            'description'   => 'Usuario con acceso total',
            'special'       => 'all-access'
        ]);

        //Asignacion del permiso al admin
        DB::table('role_user')->insert([
            'role_id' => '1',   
            'user_id' => '1'
        ]);

        DB::table('users_detail')->insert([
            'user_id'           => '1',   
            'tipo_documento_id' => '1',
            'numero_documento'  => '01234566789',
            'primer_nombre'     => 'Administrador',
            'segundo_nombre'    => '',
            'primer_apellido'   => 'del',
            'segundo_apellido'  => 'sistema'
        ]);

         /**GROPO DE USUARIO EXTERNOS*/
        Role::create([
            'name'          => 'Aspirantes',
            'slug'          => 'aspirantes',
            'description'   => 'Rol por defecto de usuarios que son aspirantes'
        ]);

        //Asignacion del permiso al aspirante

        //Ver detalle de convocatorias
        DB::table('permission_role')->insert(
            ['permission_id' => '26', 'role_id' => '2']
        );
        //Ver en detalle el detalle de una convocatoria
         DB::table('permission_role')->insert(
            ['permission_id' => '27', 'role_id' => '2']
        );
        //Aplicar a convocatoria
        DB::table('permission_role')->insert(
            ['permission_id' => '30', 'role_id' => '2']
        );

               
    }
}
