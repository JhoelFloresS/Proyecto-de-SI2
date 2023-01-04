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
   
    public function index()
    {
        $tenants = Tenant::all(); 
        return view('central.tenants.index' ,compact('tenants'));
    }

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

  
        $role1 = Role::create(['name' => 'Admin']);

        Permission::create(['name' => 'Gestionar Perfil'])->syncRoles([$role1]);
        Permission::create(['name' => 'Gestionar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'Gestionar Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'Gestionar Bitacora'])->syncRoles([$role1]);
        Permission::create(['name' => 'backups'])->syncRoles([$role1]);
        Permission::create(['name' => 'Administracion'])->syncRoles([$role1]);
        Permission::create(['name' => 'Clientes'])->syncRoles([$role1]);
        Permission::create(['name' => 'Perzonalizacion'])->syncRoles([$role1]);
        Permission::create(['name' => 'Procesos Crediticios'])->syncRoles([$role1]);
        Permission::create(['name' => 'Creditos'])->syncRoles([$role1]);
        Permission::create(['name' => 'Solicitudes'])->syncRoles([$role1]);
        Permission::create(['name' => 'Reportes'])->syncRoles([$role1]);

        
        $user->roles()->sync('Admin');
        
        return redirect()->route('tenant.users', tenant('id'));
    }

     public function create2()
    {
        
        return view('central.tenants.create');
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'id'=>'required',
            'name'=>'required',
            'email'=>'required',
        ]);
        
        $tenant= new Tenant();
        $tenant->id = $request->id;
        $tenant->name = $request->name;
        $tenant->direccion = $request->direccion;
        $tenant->email = $request->email;
        $tenant->logo = $request->logo;
        $tenant->pagina_web = $request->pagina_web;
        $tenant->save();
        

        return redirect()->route('central.tenants');  
    }



 
    public function edit(Tenant $tenant)
    {
        return view('central.tenants.edit',compact('tenant'));
    }

    public function update(Request $request,Tenant $tenant)
    {
        $request->validate([
            'id'=>'required',
            'name'=>'required',
            'email'=>'required',
        ]);
        
        $tenant->id = $request->id;
        $tenant->name = $request->name;
        $tenant->direccion = $request->direccion;
        $tenant->email = $request->email;
        $tenant->logo = $request->logo;
        $tenant->pagina_web = $request->pagina_web;
        $tenant->save();
        

        return redirect()->route('central.tenants');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return redirect()->route('central.tenants');
    }
}
