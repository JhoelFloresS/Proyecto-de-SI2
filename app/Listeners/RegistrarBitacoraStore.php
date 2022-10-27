<?php

namespace App\Listeners;

use App\Events\RegistrarBitacora;
use App\Models\Bitacora as ModelsBitacora;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class RegistrarBitacoraStore
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
     * @param  \App\Events\RegistrarBitacora  $event
     * @return void
     */
    public function handle(RegistrarBitacora $event)
    {
        //dd($event->request['accion']);
        /**
         * Falta completar el tenants_id
         */
        ModelsBitacora::create([
            'accion' => $event->request['accion'],
            'fecha' => date('Y-m-d H:i:s'),
            'ip_maquina' => request()->getClientIp(),
            'users_id' => Auth::user()->id,
            'tenants_id' => 'bcp',
        ]);
        
    }
}
