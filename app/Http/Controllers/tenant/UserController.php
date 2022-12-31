<?php

namespace App\Http\Controllers\tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\tenant\Departamento;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view('tenant.users.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $departamentos = Departamento::all();
        return view('tenant.users.create', compact('roles', 'departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'roles' => 'required',
            'departamentos' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->departamentos_id = $request->departamentos;
        $user->save();

        $user->roles()->sync($request->roles);


        return redirect()->route('tenant.users', tenant('id'));
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
    public function edit(User $user)
    {
        $roles = Role::all();
        $role_id = DB::table('model_has_roles',)->where('model_id', $user->id)->select('role_id')->first();
        $departamentos = Departamento::all();
        $departamento_id = DB::table('users',)->where('id', $user->id)->select('departamentos_id')->first();
        return view('tenant.users.edit', compact('user', 'roles', 'role_id', 'departamentos', 'departamento_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        /* dd($request); */
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'roles' => 'required',
            'departamentos' => 'required',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password <> '') {
            $user->password = Hash::make($request->password);
        }
        $user->departamentos_id = $request->departamentos;
        $user->save();

        $user->roles()->sync($request->roles);

        return redirect()->route('tenant.users', tenant('id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('tenant.users', tenant('id'));
    }
}
