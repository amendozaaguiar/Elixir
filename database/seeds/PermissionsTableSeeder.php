<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**USERS*/
        Permission::create([
            'name'          => 'Navegar usuarios',
            'slug'          => 'users.index',
            'description'   => 'Lista y navega todos los usuarios',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de usuario',
            'slug'          => 'users.show',
            'description'   => 'Ver en detalle cada usuario usuario',            
        ]);

        Permission::create([
            'name'          => 'Creación de usuarios',
            'slug'          => 'users.create',
            'description'   => 'Crear nuevos usuarios',
        ]);
        
        Permission::create([
            'name'          => 'Edición de usuarios',
            'slug'          => 'users.edit',
            'description'   => 'Editar los datos de cualquier usuario',
        ]);        
        
        /**ROLES*/
        Permission::create([
            'name'          => 'Navegar roles',
            'slug'          => 'roles.index',
            'description'   => 'Lista y navega todos los roles',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un rol',
            'slug'          => 'roles.show',
            'description'   => 'Ver en detalle cada rol',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de roles',
            'slug'          => 'roles.create',
            'description'   => 'crear nuevos roles',
        ]);
        
        Permission::create([
            'name'          => 'Edición de roles',
            'slug'          => 'roles.edit',
            'description'   => 'Editar cualquier dato de un rol',
        ]);

        /**CAT*/
        Permission::create([
            'name'          => 'Navegar CAT',
            'slug'          => 'cats.index',
            'description'   => 'Lista y navega todos los CAT',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un CAT',
            'slug'          => 'cats.show',
            'description'   => 'Ve en detalle cada CAT',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de CAT',
            'slug'          => 'cats.create',
            'description'   => 'Crear nuevos CAT en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de CAT',
            'slug'          => 'cats.edit',
            'description'   => 'Editar cualquier dato de un CAT',
        ]);


        /**PROGRAMAS*/
        Permission::create([
            'name'          => 'Navegar programas',
            'slug'          => 'programas.index',
            'description'   => 'Lista y navega todos los programas',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un programa',
            'slug'          => 'programas.show',
            'description'   => 'Ve en detalle cada programa',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de programas',
            'slug'          => 'programas.create',
            'description'   => 'Crear nuevos programas en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de programas',
            'slug'          => 'programas.edit',
            'description'   => 'Editar cualquier dato de un programa',
        ]);


        /**CURSOS*/
        Permission::create([
            'name'          => 'Navegar cursos',
            'slug'          => 'cursos.index',
            'description'   => 'Lista y navega todos los cursos',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un curso',
            'slug'          => 'cursos.show',
            'description'   => 'Ve en detalle cada curso',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de cursos',
            'slug'          => 'cursos.create',
            'description'   => 'Crear nuevos cursos en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de cursos',
            'slug'          => 'cursos.edit',
            'description'   => 'Editar cualquier dato de un curso',
        ]);
        
        /**CONVOCATORIAS*/
        Permission::create([
            'name'          => 'Navegar convocatorias',
            'slug'          => 'convocatorias.index',
            'description'   => 'Lista y navega todas los convocatorias',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de una convocatoria',
            'slug'          => 'convocatorias.show',
            'description'   => 'Ver en detalle cada convocatoria',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de convocatorias',
            'slug'          => 'convocatorias.create',
            'description'   => 'Crear nuevas convocatorias en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de convocatorias',
            'slug'          => 'convocatorias.edit',
            'description'   => 'Editar cualquier dato de una convocatoria',
        ]);
        
        Permission::create([
            'name'          => 'Ver aspirantes de convocatorias',
            'slug'          => 'convocatorias.show.aspirantes',
            'description'   => 'Ver todos los aspirantes a la convocatoria',      
        ]);

        /**DETALLE DE CONVOCATORIAS*/
        Permission::create([
            'name'          => 'Navegar detalle de convocatorias',
            'slug'          => 'detalleConvocatorias.index',
            'description'   => 'Lista y navega todos los detalles convocatorias',
        ]);

        Permission::create([
            'name'          => 'Ver de forma individual cada uno de los detalles de una convocatoria',
            'slug'          => 'detalleConvocatorias.show',
            'description'   => 'Ve el detalle de forma individual de una convocatoria',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de detalles convocatorias',
            'slug'          => 'detalleConvocatorias.create',
            'description'   => 'crear un detalle de convocatorias en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición del detalle de una convocatoria',
            'slug'          => 'detalleConvocatorias.edit',
            'description'   => 'Editar cualquier dato del detalle de una convocatoria',
        ]);

        /**APLICANTES CONVOCATORIA*/
        Permission::create([
            'name'          => 'Creación de aplicantesConvocatoria',
            'slug'          => 'aplicantesConvocatorias.create',
            'description'   => 'Aplicar a convocatorias',
        ]);
        
        Permission::create([
            'name'          => 'Ver hojas de vida de aspirantes',
            'slug'          => 'aplicantesConvocatorias.show.hv',
            'description'   => 'Visualizar las hojas de vida de los aspirantes',      
        ]);

        Permission::create([
            'name'          => 'Pre-seleccion de aspirantes',
            'slug'          => 'aplicantesConvocatorias.edit.preselected',
            'description'   => 'Realizar la preseleccion de los aspirantes (Permite la evalucion de las hojas de vida)',
        ]);

        /**EVALUACIONES DE PRE-SELECCIONADOS*/
        Permission::create([
            'name'          => 'Navegar evaluaciones',
            'slug'          => 'evaluacionesAspirantes.index',
            'description'   => 'Lista y navega todos los pre-seleccionados',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de una evaluacion',
            'slug'          => 'evaluacionesAspirantes.show',
            'description'   => 'Ve en detalle cada pre-seleccionado',            
        ]);
        
        Permission::create([
            'name'          => 'Edición de evaluaciones',
            'slug'          => 'evaluacionesAspirantes.edit',
            'description'   => 'Editar cualquier dato de un pre-seleccionado',
        ]);

        /**REPORTES*/
        Permission::create([
            'name'          => 'Reportes de convocatorias',
            'slug'          => 'convocatorias.report',
            'description'   => 'Generar reportes de una convocatoria',
        ]);

    }
}
