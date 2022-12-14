<?php

namespace App\Http\Controllers\tenant;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('tenant.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permisos = Permission::all();
        return view('tenant.roles.create', compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required|unique:roles'
        ]);
        $rol = new Role();
        $rol->name=$request->name;
        $rol->save();
        /* return $rol; */
        $rol->syncPermissions($request->permisos);
        return redirect()->route('tenant.roles',tenant('id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /* return view('roles.show', compact('role')); */
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permisos = Permission::all();
        $permisoArray = array();

        foreach ($permisos as $permiso) {
            $p = json_decode($permiso, true);
            array_push($permisoArray, $p['name']);
        }

        $per = $role->getPermissionNames();
        $perA = json_decode($per, true);

        return view('tenant.roles.edit', compact('role', 'permisos', 'permisoArray', 'per', 'perA'));
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
        $this->validate($request,[
            'name'=> "required|unique:roles,name,$role->id",
            'name'=> "required|unique:roles,guard_name,$role->id",
        ]);
        $role = Role::findOrFail($role->id);
        $role->name = $request->name;
        $role->syncPermissions($request->permisos);

        $role->save();
        return redirect()->route('tenant.roles',tenant('id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        Role::destroy($role->id);
        return redirect()->route('tenant.roles',tenant('id'));
    }
}
