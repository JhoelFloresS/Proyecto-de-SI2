<?php

namespace App\Http\Controllers\tenant;

use App\Events\tenant\RegistrarBitacoraTenant;
use App\Http\Controllers\Controller;
use App\Models\tenant\Credito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\tenant\Notificacion;
use App\Models\tenant\EnviarNotificaion;

class CreditoController extends Controller
{

    public function index()
    {
        $creditos = Credito::paginate('7');
        return view('tenant.creditos.index', compact('creditos'));
    }

    public function create()
    {
        return view('tenant.creditos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|min:3',
            'descripcion' => 'required|min:3',
        ]);

        Credito::create($request->all());
        event(new RegistrarBitacoraTenant([
            'accion' => 'Creó un nuevo credito para la empresa, el usuario: '
                . Auth::user()->name,
        ]));

        /* Notificaion */
        $titulo = 'Nuevo credito';
        $notificaciones = Notificacion::all();
        $mensaje = 'Se ha creado un nuevo credito para la empresa. Nombre del credito: '.$request->nombre;
        /* dd($notificaciones); */
        foreach ($notificaciones as $notificacion) {
            $token = $notificacion->token;
            EnviarNotificaion::enviarNotificaion($token, $titulo, $mensaje);
        }

        return redirect()->route('tenant.creditos.index', tenant('id'));
    }

    public function edit(Credito $credito)
    {
        return view('tenant.creditos.edit', compact('credito'));
    }

    public function update(Request $request, Credito $credito)
    {
        $request->validate([
            'nombre' => 'required|string|min:3',
            'descripcion' => 'required|min:3',
        ]);

        $credito->update($request->all());
        event(new RegistrarBitacoraTenant([
            'accion' => 'Editó los datos del credito: ' . $credito->nombre . ', el usuario: '
                . Auth::user()->name,
        ]));

        /* Notificaion */
        $titulo = 'Credito editado';
        $notificaciones = Notificacion::all();
        $mensaje = 'Se ha editado el credito: '.$credito->nombre;
        /* dd($notificaciones); */
        foreach ($notificaciones as $notificacion) {
            $token = $notificacion->token;
            EnviarNotificaion::enviarNotificaion($token, $titulo, $mensaje);
        }

        return redirect()->route('tenant.creditos.index', tenant('id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Credito $credito)
    {
        //
        /* Notificaion */
        $titulo = 'Credito eliminado';
        $notificaciones = Notificacion::all();
        $mensaje = 'Se ha eliminado el credito: '.$credito->nombre;
        /* dd($notificaciones); */
        foreach ($notificaciones as $notificacion) {
            $token = $notificacion->token;
            EnviarNotificaion::enviarNotificaion($token, $titulo, $mensaje);
        }
        $credito->delete();
        return redirect()->route('tenant.creditos.index', tenant('id'));
    }
}
