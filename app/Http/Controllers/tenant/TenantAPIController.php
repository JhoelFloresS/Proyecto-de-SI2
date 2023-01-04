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
use App\Models\tenant\Credito;
use Illuminate\Support\Facades\Auth;
/* solicitud */
use App\Models\tenant\SolicitudCredito;

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

    public function notificacionToken(Request $request)
    {
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

    public function solicitudesGet()
    {
        $solicitudes = SolicitudCredito::all();
        /* $usuarios = User::all();
        $clientes = Cliente::all(); */
        foreach ($solicitudes as $solicitud) {
            $nombre = Cliente::find($solicitud->cliente_id)->user->name;
            /* $cliente = $solicitud->cliente->user->name; */
            /* $dato = $usuario->id; */
            $solicitud->cliente = $nombre;
            /* $solicitud->credito; */
        }
        return $solicitudes;
    }

    public function creditosGet()
    {
        $creditos = Credito::all();
        return $creditos;
    }
}
