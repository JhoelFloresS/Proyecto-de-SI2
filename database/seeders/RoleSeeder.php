<?php

namespace Database\Seeders;


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
    
        
        $permission = Permission::create(['name' => 'Gestionar Perfil'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'Gestionar Usuarios'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'Gestionar Roles'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'Gestionar Bitacora'])->syncRoles([$role1]);
      
    
        
    }
}
