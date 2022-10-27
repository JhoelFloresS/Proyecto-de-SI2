<?php

namespace App\Listeners\tenant;

use App\Events\tenant\RegistrarBitacoraTenant;
use App\Models\tenant\Bitacora as TenantBitacora;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class RegistrarBitacoraStoreTenant
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\tenant\RegistrarBitacoraTenant  $event
     * @return void
     */
    public function handle(RegistrarBitacoraTenant $event)
    {
        //dd(now());
        //dd(request()->getClientIp());
        //dd($event->request['accion']);
        TenantBitacora::create([
            'accion' => $event->request['accion'],
            'fecha' => date('Y-m-d H:i:s'),
            'ip_maquina' => request()->getClientIp(),
            'users_id' => Auth::user()->id,
        ]);

    }
}
