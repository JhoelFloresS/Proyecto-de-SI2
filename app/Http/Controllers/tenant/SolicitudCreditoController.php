<?php

namespace App\Http\Controllers\tenant;

use App\Events\tenant\RegistrarBitacoraTenant;
use App\Http\Controllers\Controller;
use App\Models\tenant\Cliente;
use App\Models\tenant\Credito;
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
        ]);
        $solicitud = SolicitudCredito::create([
            'cliente_id' => $request->cliente_id,
            'credito_id' => $request->credito_id,
            'monto' => $request->monto,
            'fecha_hora' => date('Y-m-d H:i:s'),
        ]);
        GestionCredito::create([
            'empleado_id' => Auth::user()->id,
            'solicitud_id' => $solicitud->id,
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
        //
        // dd($request->all());
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
        //
        $solicitud->delete();
        return redirect()->route('tenant.solicitudes.index', tenant('id'));
    }
}
