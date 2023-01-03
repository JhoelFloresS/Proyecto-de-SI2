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
        $archivo= Cloudinary::upload($file->getRealPath(), ['folder' => 'documentos']);

        Documento::create([
            'archivo_url' => $archivo->getSecurePath(),
            'public_id' => $archivo->getPublicId(),
            'formato' => $archivo->getExtension(),
            'descripcion' => $request->descripcion,
            'fecha_hora' => date('Y-m-d H:i:s'),
            'carpeta_id' => $carpetaId,
        ]);

        event(new RegistrarBitacoraTenant([
            'accion' => 'Creó un nuevo documento, el usuario: '. Auth::user()->name,
        ]));

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
        
        if($request->hasFile('archivo')) {
            ini_set('max_execution_time', 180); // 3min
            Cloudinary::destroy($documento->public_id);
            $file = $request->file('archivo');
            $archivo= Cloudinary::upload($file->getRealPath(), ['folder' => 'documentos']);
            $documento->archivo_url = $archivo->getSecurePath();
            $documento->public_id = $archivo->getPublicId();  
            $documento->formato = $archivo->getExtension();
        }

        $documento->descripcion = $request->descripcion;
        $documento->save();
        $carpetaId = $documento->carpeta_id;

        event(new RegistrarBitacoraTenant([
            'accion' => 'Editó un documento, el usuario: '. Auth::user()->name,
        ]));
        
        return redirect()->route('tenant.solicitudes.show.documents', [tenant('id'), $carpetaId])
        ->with('success', 'Archivo editado correctamente');
    }

    public function destroy(Documento $documento)
    {
        $carpetaId = $documento->carpeta_id;
        Cloudinary::destroy($documento->public_id);
        $documento->delete();
    
        return redirect()->route('tenant.solicitudes.show.documents', [tenant('id'), $carpetaId])
        ->with('danger', 'Archivo eliminado correctamente');;
    }


}
