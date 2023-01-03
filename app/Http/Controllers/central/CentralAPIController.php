<?php

namespace App\Http\Controllers\central;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/* Plan */
use App\Models\Plan;
/* Suscripcion */
use App\Models\Suscripcion;
/* tenants */
use App\Models\Tenant;

class CentralAPIController extends Controller
{
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

    public function tenantID(Request $request)
    {
        $tenant = Tenant::where('id', $request->tenant)->first();
        if ($tenant) {
            $tenant_id = $tenant->id;
            return response()->json([
                'status' => true,
                'message' => 'Tenant ID',
                'tenant_id' => $tenant_id,
                'tenant_name' => $tenant->name,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Tenant ID not found'
            ], 404);
        }
    }
}
