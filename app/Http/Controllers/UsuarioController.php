<?php

namespace App\Http\Controllers;

use App\Models\tenant\User as TenantUser;
use Illuminate\Http\Request;
use App\Models\tenant\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Arr;
class UsuarioController extends Controller
{   
    public function __construct()
    {
        //$this->middleware('can:tenant.Usuarios.index')->only('index');
    }

    public function index(Request $request)
    {   
        $busqueda = $request->busqueda;
        $users = user::where('name','LIKE', '%'. $busqueda.'%')
        ->orWhere('email','LIKE', '%'. $busqueda.'%')
        ->paginate();
        return view('tenant.usuarios.index', compact('users'));
    }


    public function create()
    {
        $roles=Role::pluck('name', 'name')->all();
        return view('tenant.usuarios.crear', compact('roles')); 
    }


    public function store(Request $request)
    {
     $this->validate($request,[
        'name'=>'required',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|same:confirm-password',
        'roles'=>'required'
     ]);

     $input = $request->all();   
     $input['password'] = hash::make($input['password']);

     $user = user::create($input);
     $user->assignRole($request->input('roles'));
     
     return redirect()->route('usuarios.index',tenant('id'));

    }


    public function edit( $id)
    {   $user=user::find($id);
        $roles = Role::all();
        //$userRole = $user->roles->pluck('name','name')->all();

        return view('tenant.usuarios.editar', compact('user','roles'));
    }

    public function update(Request $request, $id)
    {   $user = user::find($id);
        $user->roles()->sync($request->roles);
        return redirect()->route('usuarios.index', tenant('id'))->with('info','se asigno los roles correctamente ');

        //$this->validate($request,[
        //    'name'=>'required',
        //    'email'=>'required|email|unique:users,email,'.$id,
        //    'password'=>'same:confirm-password',
        //    'roles'=>'required'
        //]);

        // $input = $request->all();
        // if(!empty($input['password'])){
         //   $input['password'] = hash::make($input['password']);
         //}else{
         //   $input = Arr::except($input, array('password'));
        // }

        // $user = user::find($id);
        // $user -> update($input);
        // DB::table('model_has_roles')->where('model_id', $id)->delete();

         // $user->assignRole($request->input('roles'));
         return redirect()->route('usuarios.index', tenant('id'))->with('info','se asigno los roles correctamente ');
    } 
}
