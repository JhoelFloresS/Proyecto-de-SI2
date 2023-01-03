<?php

namespace App\Http\Controllers\tenant;

use App\Events\tenant\RegistrarBitacoraTenant;
use App\Http\Controllers\Controller;
use App\Models\tenant\CarpetaCredito;
use App\Models\tenant\Cliente;
use App\Models\tenant\Credito;
use App\Models\tenant\CreditoDetalle;
use App\Models\tenant\Documento;
use App\Models\tenant\GestionCredito;
use App\Models\tenant\SolicitudCredito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SolicitudCreditoController extends Controller
{

    public function index()
    {
        $solicitudes = SolicitudCredito::paginate('7');
        $solicitudes->load('cliente');
        $solicitudes->load('credito');
        return view('tenant.solicitudes.index', compact('solicitudes'));
    }

    public function create()
    {
        $clientes = Cliente::get();
        $clientes->load('user');
        $creditos = Credito::get();
        return view('tenant.solicitudes.create', compact('clientes', 'creditos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required',
            'credito_id' => 'required',
            'monto' => 'required',
            'motivo' => 'required',
            'tasa_interes' => 'required',
            'nro_cuotas' => 'required',
        ]);
        $solicitud = SolicitudCredito::create([
            'cliente_id' => $request->cliente_id,
            'credito_id' => $request->credito_id,
            'monto' => $request->monto,
            'fecha_hora' => date('Y-m-d H:i:s'),
            'motivo' => $request->motivo,
            'estado' => 'En proceso',
        ]);
        GestionCredito::create([
            'empleado_id' => Auth::user()->id,
            'solicitud_id' => $solicitud->id,
        ]);
        $carpeta = CarpetaCredito::create([
            'solicitud_id' => $solicitud->id,
            'requisito' => ''
        ]);
        CreditoDetalle::create([
            'fecha_inicio' => date('Y-m-d H:i:s'),
            'tasa_interes' => $request->tasa_interes,
            'nro_cuotas' => $request->nro_cuotas,
            'fecha_fin' => $request->fecha_fin,
            'carpeta_id' => $carpeta->id,
        ]);

        $cliente = Cliente::findOrFail($request->cliente_id);
        $cliente->load('user');
        event(new RegistrarBitacoraTenant([
            'accion' => 'Creó una nueva solicitud de credito para el cliente: '
                . $cliente->user->name . ', el usuario: ' . Auth::user()->name,
        ]));

        return redirect()->route('tenant.solicitudes.index', tenant('id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SolicitudCredito $solicitud)
    {
        $solicitud->load('carpeta_credito');
        $solicitud->load('cliente');
        $solicitud->cliente->load('user');
        $solicitud->load('credito');
        $detalle = CreditoDetalle::where('carpeta_id', $solicitud->carpeta_credito->id)->first();
        return view('tenant.solicitudes.show', compact('solicitud', 'detalle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SolicitudCredito $solicitud)
    {
        $clientes = Cliente::all();
        $cliente_id = DB::table('solicitud_creditos')
            ->where('id', $solicitud->id)
            ->select('cliente_id')
            ->first();
        $clientes->load('user');
        $creditos = Credito::all();
        $credito_id = DB::table('solicitud_creditos')
            ->where('id', $solicitud->id)
            ->select('credito_id')
            ->first();
        return view('tenant.solicitudes.edit', compact('solicitud', 'clientes', 'cliente_id', 'creditos', 'credito_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cliente_id' => 'required',
            'credito_id' => 'required',
            'monto' => 'required',
        ]);
        $solicitud = SolicitudCredito::findOrFail($id);
        $solicitud->update([
            'cliente_id' => $request->cliente_id,
            'credito_id' => $request->credito_id,
            'monto' => $request->monto,
            'fecha_hora' => date('Y-m-d H:i:s'),
        ]);
        $cliente = Cliente::findOrFail($request->cliente_id);
        $cliente->load('user');
        return redirect()->route('tenant.solicitudes.index', tenant('id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SolicitudCredito $solicitud)
    {
        $solicitud->delete();
        return redirect()->route('tenant.solicitudes.index', tenant('id'));
    }

    public function showDocuments($carpetaId) {
        $documentos = Documento::where('carpeta_id', $carpetaId)->get();
        return view('tenant.documentos.index', compact('documentos', 'carpetaId'));
    }

}
