<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Tenant;
use App\Models\User;
use App\Models\tenant\Departamento;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TenantController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function create(Request $request)
    {
        $tenant = new Tenant();
        $tenant->name = $request->nombre;
        $tenant->id = $request->identificador;
        $tenant->email = $request->email;
        $tenant->save();

        tenancy()->initialize($tenant);

        $departamento = Departamento::create([
            'nombre' => 'Administración',
            'descripcion' => 'Donde se encuentra el personal de gerencia, subgerecia, etc'
            
        ]);

        $user = new User();
        $user->name = $request->nombre_admin;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->departamentos_id= $departamento->id;
        $user->save();

        Permission::create(['name' => 'Gestionar Perfil']);
        Permission::create(['name' => 'Gestionar Usuarios']);
        Permission::create(['name' => 'Gestionar Roles']);
        Permission::create(['name' => 'Gestionar Bitacora']);
      
        $user->roles()->sync(  Role::create(['name' => 'admin']));

        return redirect()->route('tenant.users', tenant('id'));
    }
}
