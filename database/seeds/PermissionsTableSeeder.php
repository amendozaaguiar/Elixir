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
            'description'   => 'Lista y navega todos los usuarios del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de usuario',
            'slug'          => 'users.show',
            'description'   => 'Ve en detalle cada usuario del sistema',            
        ]);

        Permission::create([
            'name'          => 'Creación de usuarios',
            'slug'          => 'users.create',
            'description'   => 'Podría crear nuevos usuarios en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de usuarios',
            'slug'          => 'users.edit',
            'description'   => 'Podría editar cualquier dato de un usuario del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar usuario',
            'slug'          => 'users.destroy',
            'description'   => 'Podría eliminar cualquier usuario del sistema',      
        ]);

        /**ROLES*/
        Permission::create([
            'name'          => 'Navegar roles',
            'slug'          => 'roles.index',
            'description'   => 'Lista y navega todos los roles del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un rol',
            'slug'          => 'roles.show',
            'description'   => 'Ve en detalle cada rol del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de roles',
            'slug'          => 'roles.create',
            'description'   => 'Podría crear nuevos roles en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de roles',
            'slug'          => 'roles.edit',
            'description'   => 'Podría editar cualquier dato de un rol del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar roles',
            'slug'          => 'roles.destroy',
            'description'   => 'Podría eliminar cualquier rol del sistema',      
        ]);

        /**CONVOCATORIAS*/
        Permission::create([
            'name'          => 'Navegar convocatorias',
            'slug'          => 'convocatorias.index',
            'description'   => 'Lista y navega todos los convocatorias del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de una convocatoria',
            'slug'          => 'convocatorias.show',
            'description'   => 'Ve en detalle cada convocatoria del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de convocatorias',
            'slug'          => 'convocatorias.create',
            'description'   => 'Podría crear nuevas convocatorias en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de convocatorias',
            'slug'          => 'convocatorias.edit',
            'description'   => 'Podría editar cualquier dato de una convocatoria del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar convocatorias',
            'slug'          => 'convocatorias.destroy',
            'description'   => 'Podría eliminar cualquier convocatoria del sistema',      
        ]);

         Permission::create([
            'name'          => 'Eliminar convocatorias',
            'slug'          => 'convocatorias.show.aspirantes',
            'description'   => 'Puede ver todos los aspirantes a la convocatoria',      
        ]);

        
        /**CAT*/
        Permission::create([
            'name'          => 'Navegar CAT',
            'slug'          => 'cats.index',
            'description'   => 'Lista y navega todos los CAT del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un CAT',
            'slug'          => 'cats.show',
            'description'   => 'Ve en detalle cada CAT del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de CAT',
            'slug'          => 'cats.create',
            'description'   => 'Podría crear nuevos CAT en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de CAT',
            'slug'          => 'cats.edit',
            'description'   => 'Podría editar cualquier dato de un CAT del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar CAT',
            'slug'          => 'cats.destroy',
            'description'   => 'Podría eliminar cualquier CAT del sistema',      
        ]);


        /**PROGRAMAS*/
        Permission::create([
            'name'          => 'Navegar programas',
            'slug'          => 'programas.index',
            'description'   => 'Lista y navega todos los programas del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un programa',
            'slug'          => 'programas.show',
            'description'   => 'Ve en detalle cada programa del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de programas',
            'slug'          => 'programas.create',
            'description'   => 'Podría crear nuevos programas en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de programas',
            'slug'          => 'programas.edit',
            'description'   => 'Podría editar cualquier dato de un programa del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar programas',
            'slug'          => 'programas.destroy',
            'description'   => 'Podría eliminar cualquier programa del sistema',      
        ]);


        /**CURSOS*/
        Permission::create([
            'name'          => 'Navegar cursos',
            'slug'          => 'cursos.index',
            'description'   => 'Lista y navega todos los cursos del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un curso',
            'slug'          => 'cursos.show',
            'description'   => 'Ve en detalle cada curso del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de cursos',
            'slug'          => 'cursos.create',
            'description'   => 'Podría crear nuevos cursos en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de cursos',
            'slug'          => 'cursos.edit',
            'description'   => 'Podría editar cualquier dato de un curso del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar cursos',
            'slug'          => 'cursos.destroy',
            'description'   => 'Podría eliminar cualquier curso del sistema',      
        ]);


        /**APLICANTES CONVOCATORIA*/
        Permission::create([
            'name'          => 'Creación de aplicantesConvocatoria',
            'slug'          => 'aplicantesConvocatorias.create',
            'description'   => 'Podría aplicar a convocatorias',
        ]);
        
        Permission::create([
            'name'          => 'Ver hojas de vida de aspirantes',
            'slug'          => 'aplicantesConvocatorias.show.hv',
            'description'   => 'Puede visualizar las hojas de vida de los aspirantes',      
        ]);

        Permission::create([
            'name'          => 'Pre-seleccion de aspirantes',
            'slug'          => 'aplicantesConvocatorias.edit.preselected',
            'description'   => 'Puede realizar la preseleccion de los aspirantes (Permite la evalucion de las hojas de vida)',
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
            'description'   => 'Podría crear un detalle de convocatorias en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición del detalle de una convocatoria',
            'slug'          => 'detalleConvocatorias.edit',
            'description'   => 'Podría editar cualquier dato del detalle de una convocatoria',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar detalle de una convocatoria',
            'slug'          => 'detalleConvocatorias.destroy',
            'description'   => 'Podría eliminar cualquier detallde de una convocatoria',      
        ]);
    }
}
