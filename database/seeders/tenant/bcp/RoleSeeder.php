<?php

namespace Database\Seeders\tenant\bcp;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2= Role::create(['name' => 'Director de finanzas']);
        $role3 = Role::create(['name' => 'Oficial de Credito']);
        $role4 = Role::create(['name' => 'Comité de Credito']);
        $role5 = Role::create(['name' => 'Departamento Legal']);
        
        
        $permission = Permission::create(['name' => 'Gestionar Perfil'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        $permission = Permission::create(['name' => 'Gestionar Usuarios'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'Gestionar Roles'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'Gestionar Bitacora'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'backups'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'Administracion'])->syncRoles([$role1,$role3,$role4]);
        $permission = Permission::create(['name' => 'Clientes'])->syncRoles([$role1,$role2,$role3,$role4]);
        $permission = Permission::create(['name' => 'Perzonalizacion'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'Procesos Crediticios'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        $permission = Permission::create(['name' => 'Creditos'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        $permission = Permission::create(['name' => 'Solicitudes'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        $permission = Permission::create(['name' => 'Reportes'])->syncRoles([$role1,$role2]);
      
        
        
        
        

        
    }
}
