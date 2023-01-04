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
use App\Models\tenant\Notificacion;
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
            'duracion' => 'required'
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
            'duracion' => $request->duracion,
            'pago_estado' => 'En curso',
        ]);

        $cliente = Cliente::findOrFail($request->cliente_id);
        $cliente->load('user');
        event(new RegistrarBitacoraTenant([
            'accion' => 'Creó una nueva solicitud de credito para el cliente: '
                . $cliente->user->name . ', el usuario: ' . Auth::user()->name,
        ]));


        /* Notificaion */
        $notificaciones = Notificacion::all();
        /* dd($notificaciones); */
        foreach ($notificaciones as $notificacion) {
            $token = $notificacion->token;
            $SERVER_API_KEY = 'AAAAqpLfBLQ:APA91bHv3ScDqlbT3V__n0UuXNPE0_2lcj7WuJV161TyYIjOPE78dYQJ20eU2pzKtuxsCpCrXQUHpbHDVezHGtdgl84ldl8iENaeksaR_TNePK3-GHiiV34GFx2X9QDB2QXOMvLZHhDZ';
            $data = [
                /* "registration_ids" => $firebaseToken, */
                "registration_ids" => [$token],
                "notification" => [
                    "title" => 'Nueva Solicitud de Credito',
                    "body" => 'Se ha creado una nueva solicitud de credito',
                    "content_available" => true,
                    "priority" => "high",
                ]
            ];
            $dataString = json_encode($data);

            $headers = [
                'Authorization: key=' . $SERVER_API_KEY,
                'Content-Type: application/json',
            ];

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

            $response = curl_exec($ch);

            /* dd($response); */
        }
        /* Notificaion FIn */

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
        $solicitud->load('carpeta_credito');
        $solicitud->load('cliente');
        $solicitud->cliente->load('user');
        $solicitud->load('credito');

        $clientes = Cliente::get();
        $clientes->load('user');
        $creditos = Credito::get();
        $detalle = CreditoDetalle::where('carpeta_id', $solicitud->carpeta_credito->id)->first();

        return view('tenant.solicitudes.edit', compact('solicitud', 'clientes','creditos', 'detalle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SolicitudCredito $solicitud)
    {
        $request->validate([
            'cliente_id' => 'required',
            'credito_id' => 'required',
            'monto' => 'required',
            'motivo' => 'required',
            'tasa_interes' => 'required',
            'nro_cuotas' => 'required',
            'duracion' => 'required',
            'pago_estado' => 'required',
            'estado' => 'required',
        ]);
        if ($request->pago_estado == 'Pagado') {
            // Cuando el cliente a cancelado todo el credito
            $request->estado = 'Documentado';
        }
        $solicitud->update([
            'cliente_id' => $request->cliente_id,
            'credito_id' => $request->credito_id,
            'monto' => $request->monto,
            'motivo' => $request->motivo,
            'estado' => $request->estado,
        ]);
        $detalle = CreditoDetalle::findOrFail($solicitud->carpeta_credito->id);
        $detalle->update([
            'nro_cuotas' => $request->nro_cuotas,
            'tasa_interes' => $request->tasa_interes,
            'duracion' => $request->duracion,
            'pago_estado' => $request->pago_estado,
        ]);
        event(new RegistrarBitacoraTenant([
            'accion' => 'Editó una solicitud de credito del cliente: '
                . $solicitud->cliente->user->name . ', el usuario: ' . Auth::user()->name,
        ]));

        return redirect()->route('tenant.solicitudes.index', tenant('id'));
    }

    
    public function destroy(SolicitudCredito $solicitud)
    {
        event(new RegistrarBitacoraTenant([
            'accion' => 'Eliminó una solicitud de credito del cliente: '
                . $solicitud->cliente->user->name . ', el usuario: ' . Auth::user()->name,
        ]));
        $solicitud->delete();
        
        return redirect()->route('tenant.solicitudes.index', tenant('id'));
    }

    public function notificacion()
    {
        $notificaciones = Notificacion::all();
        foreach ($notificaciones as $notificacion) {
            $token = $notificacion->token;
            $SERVER_API_KEY = 'AAAAqpLfBLQ:APA91bHv3ScDqlbT3V__n0UuXNPE0_2lcj7WuJV161TyYIjOPE78dYQJ20eU2pzKtuxsCpCrXQUHpbHDVezHGtdgl84ldl8iENaeksaR_TNePK3-GHiiV34GFx2X9QDB2QXOMvLZHhDZ';
            $data = [
                /* "registration_ids" => $firebaseToken, */
                "registration_ids" => [$token],
                "notification" => [
                    "title" => 'Nueva Solicitud de Credito',
                    "body" => 'Se ha creado una nueva solicitud de credito',
                    "content_available" => true,
                    "priority" => "high",
                ]
            ];
            $dataString = json_encode($data);

            $headers = [
                'Authorization: key=' . $SERVER_API_KEY,
                'Content-Type: application/json',
            ];

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

            $response = curl_exec($ch);

            /* dd($response); */
        }
    }
    
    public function showDocuments($carpetaId) {
        $documentos = Documento::where('carpeta_id', $carpetaId)->get();
        return view('tenant.documentos.index', compact('documentos', 'carpetaId'));
    }

}
