<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role1 = Role::create(['name' =>'Admin']);
       $role2 = Role::create(['name' =>' Analista']);
       /*permisos para manipular los comercios */
       Permission::create(['name' => 'Cargar comercios'])->assignRole($role1);
       Permission::create(['name' => 'Descargar comercios'])->assignRole($role1);
       Permission::create(['name' => 'Editar comercios'])->assignRole($role1);
       Permission::create(['name' => 'Registrar comercios'])->assignRole($role1);
       Permission::create(['name' => 'Inactivar comercios'])->assignRole($role1);
       Permission::create(['name' => 'Eliminar comercios'])->assignRole($role1);
       /*permisos para manipular las macros creadas por cada uno */
       Permission::create(['name' => 'Descargar macros'])->assignRole($role1);
       Permission::create(['name' => 'Editar mis macros'])->assignRole($role2, $role1);
       Permission::create(['name' => 'Crear mis macros'])->assignRole($role2, $role1);
       Permission::create(['name' => 'Eliminar mis macros'])->assignRole($role2,$role1);
       /*permisos para manipular las causas de inactividad*/ 
       Permission::create(['name' => 'Descargar causas'])->assignRole($role1);
       Permission::create(['name' => 'Cargar causas'])->assignRole($role1);
       Permission::create(['name' => 'Editar causas'])->assignRole($role1);
       /*permisos para manipular los usuarios*/
       Permission::create(['name' => 'Mirar usuarios'])->assignRole($role1);
       Permission::create(['name' => 'Inactivar usuario'])->assignRole($role1);
       Permission::create(['name' => 'Borrar usuario'])->assignRole($role1);
       /*permisos para manipular las asignaciones*/
       Permission::create(['name' => 'Descargar asignados'])->assignRole($role1);
       Permission::create(['name' => 'Registrar asignacion'])->assignRole($role1);
       Permission::create(['name' => 'Editar asignacion'])->assignRole($role1);
       Permission::create(['name' => 'Borrar asignacion'])->assignRole($role1);


    
    }
}
