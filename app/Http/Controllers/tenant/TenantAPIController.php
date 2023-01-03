<?php

namespace App\Http\Controllers\tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\tenant\Notificacion;
/* user */
use App\Models\tenant\User;
/* departamento */
use App\Models\tenant\Departamento;
/* cliente */
use App\Models\tenant\Cliente;
use Illuminate\Support\Facades\Auth;

class TenantAPIController extends Controller
{
    //
    public function departamentosGet()
    {
        $departamentos = Departamento::all();
        return $departamentos;
    }

    public function clientesGet()
    {
        $clientes = Cliente::all();
        foreach ($clientes as $cliente) {
            $cliente->user;
        }
        return $clientes;
    }

    public function notificacionToken(Request $request){
        $user_id = Auth::user()->id;
        $tokenNotification = $request->tokenNotification;
        Notificacion::create([
            'token' => $tokenNotification,
            'user_id' => $user_id
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Token registrado correctamente'
        ], 200);
    }
}
