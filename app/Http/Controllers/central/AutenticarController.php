<?php

namespace App\Http\Controllers\central;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/* Registro Request */
/* use App\Http\Requests\RegistrarRequest; */
/* user */
use App\Models\User;
/* user tenat */
use App\Models\Tenant\User as UserTenant;
/* Auth */
use Illuminate\Support\Facades\Auth;
/* Carbon */
use Carbon\Carbon;
/* Acces token */
use Illuminate\Support\Facades\Hash;
/* Validator */
use Illuminate\Support\Facades\Validator;
/* plan */
use App\Models\Plan;
use App\Models\Suscripcion;

class AutenticarController extends Controller
{

    public function login(Request $request)
    {
        /* try {
            $validateUser = Validator::make($request->all(),
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        } */
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Email & Password does not match with our record.',
            ], 401);
        }

        $token = $user->createToken("API TOKEN")->plainTextToken;

        $cookie = cookie('jwt', $token, 60 * 24);

        return response()->json([
            'user' => $user,
            'name' => $user->name,
            'status' => true,
            'message' => 'User Logged In Successfully',
            'token' => $token
        ], 200)->withCookie($cookie);
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Successfully logged out'
        ]);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    //
    public function register(Request $request)
    {
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->save();
        return response()->json(['mensaje' => 'Usuario registrado correctamente']);
    }

    public function perfilGet(Request $request)
    {
        /* tomar datos de un usuario */
        $datosUsuario = User::where('id', $request->user()->id)->first();
        /* $datosPersona = Persona::where('id', $datosUsuario->id_persona)->first(); */
        return response()->json([
            'status' => true,
            'message' => 'Datos del usuario',
            'usuario' => $datosUsuario,
        ], 200);
    }

    public function planesGet()
    {
        /* tomar datos de un usuario */
        $planes = Plan::all();
        /* $datosPersona = Persona::where('id', $datosUsuario->id_persona)->first(); */
        return $planes;
    }

    public function suscripcionesGet()
    {
        $suscripciones = Suscripcion::all();
        $planes = Plan::all();

        foreach ($suscripciones as $suscripcion) {
            $suscripcion->plan = $planes->first();
        }

        return $suscripciones;

        /* $resultado = array();

        $resultado['suscripciones'] = $suscripciones;
        $resultado['planes'] = $planes; */

        /* return $resultado; */
        /* return response()->json([
            'suscripciones' => $suscripciones,
            'planes' => $planes
        ], 200); */
    }
}
