<?php

namespace Database\Seeders\tenant\bnb;


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
        $role6 = Role::create(['name' => 'Cliente']);
        
        
        $permission = Permission::create(['name' => 'Gestionar Perfil'])->syncRoles([$role1,$role2,$role3,$role4,$role5,$role6]);
        $permission = Permission::create(['name' => 'Gestionar Usuarios'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'Gestionar Roles'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'Gestionar Bitacora'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'backups'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'Administracion'])->syncRoles([$role1]);
      
        
        
        
        

        
    }
}
