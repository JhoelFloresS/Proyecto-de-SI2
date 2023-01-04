<?php

namespace App\Http\Controllers\tenant;

use App\Events\tenant\RegistrarBitacoraTenant;
use App\Http\Controllers\Controller;
use App\Models\tenant\Documento;
use App\Models\tenant\SolicitudCredito;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\tenant\Notificacion;
use App\Models\tenant\EnviarNotificaion;

class DocumentoController extends Controller
{
    public function index(Request $request)
    {
        //
    }

    public function create($carpetaId)
    {
        return view('tenant.documentos.create', compact('carpetaId'));
    }

    public function store(Request $request, $carpetaId)
    {
        $request->validate([
            'archivo' => 'required',
            'descripcion' => 'required|min:3',
        ]);

        ini_set('max_execution_time', 180); // 3min
        $file = $request->file('archivo');
        $archivo = Cloudinary::upload($file->getRealPath(), ['folder' => 'documentos']);

        Documento::create([
            'archivo_url' => $archivo->getSecurePath(),
            'public_id' => $archivo->getPublicId(),
            'formato' => $archivo->getExtension(),
            'descripcion' => $request->descripcion,
            'fecha_hora' => date('Y-m-d H:i:s'),
            'carpeta_id' => $carpetaId,
            'estado' => 'En revisión'
        ]);
        $soliciud = SolicitudCredito::findOrFail($carpetaId);
        //cada vez que se sube algun documento, la solicitud se encontrara en revisión
        $soliciud->estado = 'En revisión';
        $soliciud->save();

        event(new RegistrarBitacoraTenant([
            'accion' => 'Creó un nuevo documento, el usuario: ' . Auth::user()->name,
        ]));

        /* Notificaion */
        $notificaciones = Notificacion::all();
        /* dd($notificaciones); */
        foreach ($notificaciones as $notificacion) {
            $token = $notificacion->token;
            $cliente = $soliciud->cliente->user->name;
            $titulo = 'Nuevo documento para el cliente';
            $mensaje = 'El usuario ' . Auth::user()->name . ' ha subido un nuevo documento para el cliente ' . $cliente;
            EnviarNotificaion::enviarNotificaion($token, $titulo, $mensaje);
        }

        return redirect()->route('tenant.solicitudes.show.documents', [tenant('id'), $carpetaId]);
    }

    public function show(Documento $documento, $carpetaId)
    {
        return view('tenant.documentos.show', compact('documento', 'carpetaId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Documento $documento,  $carpetaId)
    {
        return view('tenant.documentos.edit', compact('documento', 'carpetaId'));
    }

    public function update(Request $request, Documento $documento)
    {
        $request->validate(['descripcion' => 'required|min:3']);

        if ($request->hasFile('archivo')) {
            ini_set('max_execution_time', 180); // 3min
            Cloudinary::destroy($documento->public_id);
            $file = $request->file('archivo');
            $archivo = Cloudinary::upload($file->getRealPath(), ['folder' => 'documentos']);
            $documento->archivo_url = $archivo->getSecurePath();
            $documento->public_id = $archivo->getPublicId();
            $documento->formato = $archivo->getExtension();
        }

        $documento->descripcion = $request->descripcion;
        $documento->estado = $request->estado;
        $documento->save();
        $carpetaId = $documento->carpeta_id;

        event(new RegistrarBitacoraTenant([
            'accion' => 'Editó un documento, el usuario: ' . Auth::user()->name,
        ]));

        /* Notificaion */
        $soliciud = SolicitudCredito::findOrFail($carpetaId);
        $cliente = $soliciud->cliente->user->name;
        $titulo = 'Documento editado para el cliente';
        $notificaciones = Notificacion::all();
        $mensaje = 'El usuario ' . Auth::user()->name . ' ha editado un documento para el cliente ' . $cliente;
        /* dd($notificaciones); */
        foreach ($notificaciones as $notificacion) {
            $token = $notificacion->token;
            EnviarNotificaion::enviarNotificaion($token, $titulo, $mensaje);
        }

        return redirect()->route('tenant.solicitudes.show.documents', [tenant('id'), $carpetaId])
            ->with('success', 'Archivo editado correctamente');
    }

    public function destroy(Documento $documento)
    {
        $carpetaId = $documento->carpeta_id;
        Cloudinary::destroy($documento->public_id);
        $documento->delete();

        /* Notificaion */
        $soliciud = SolicitudCredito::findOrFail($carpetaId);
        $cliente = $soliciud->cliente->user->name;
        $titulo = 'Documento Eliminado';
        $notificaciones = Notificacion::all();
        $mensaje = 'El usuario ' . Auth::user()->name . ' ha eliminado un documento del cliente ' . $cliente;
        /* dd($notificaciones); */
        foreach ($notificaciones as $notificacion) {
            $token = $notificacion->token;
            EnviarNotificaion::enviarNotificaion($token, $titulo, $mensaje);
        }

        return redirect()->route('tenant.solicitudes.show.documents', [tenant('id'), $carpetaId])
            ->with('danger', 'Archivo eliminado correctamente');;
    }
}
