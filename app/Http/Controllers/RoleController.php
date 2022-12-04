<?php

namespace App\Http\Controllers;

use App\Models\tenant\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Database\Seeders\tenant\UserSeeder;

class RoleController extends Controller
{    

    public function index()
    {
        $roles = Role::paginate(5);

        return view('tenant.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $permissions= Permission::all();
       return view('tenant.roles.crear',compact('permissions'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required']);
        $role = Role::create($request->all());
        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.index',tenant('id'))->with('info','el rol se creo con exito');

        //$this->validate($request,['name'=>'required', 'permission'=>'required']);
        //$role=Role::create(['name'=>$request->input('name')]);
       // $role->syncPermissions($request->input('permission'));
       // return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role=Role::find($id);
        $permissions = Permission::all();
        
        //$rolePermissions= DB::table('roles_has_permissions')->where('roles_has_permissions.role_id', $id)
        //->pluck('roles_has_permissions.permission_id','roles_has_permissions.permission_id')
        //->all();
        return view('tenant.roles.editar',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate(['name'=>'required']);
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.index',tenant('id'))->with('info','el rol se actualizo con exito');
        //$this->validate($request,['name'=>'required', 'permission'=>'required']);
        //$role=Role::find($id);
        //$role->name=$request->input('name');
        //$role->save();

        //$role->syncPermissions($request->input('permission'))
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        if(!empty(User::role($role)->get()))
            return redirect()->route('roles.index')->with('error', 'No se puede eliminar el rol porque tiene usuarios asignados');
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Rol eliminado con éxito');
    }
}
