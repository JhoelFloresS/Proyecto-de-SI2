<?php

namespace Database\Seeders\tenant;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {   $role1 = Role::create(['name' => 'super-admin']);
        $role2 = Role::create(['name' => 'cajero']);
        $role3 = Role::create(['name' => 'agente de credito']);

       Permission::create(['name' => 'tenant.Usuarios.index', 'description' => 'ver listado de usuarios'])->syncRoles([$role1]);
       Permission::create(['name' => 'tenant.Usuarios.crear', 'description' => 'crear usuario'])->syncRoles([$role1]);
       Permission::create(['name' => 'tenant.Usuarios.editar', 'description' => 'editar usuario'])->syncRoles([$role1]);
    }
}
