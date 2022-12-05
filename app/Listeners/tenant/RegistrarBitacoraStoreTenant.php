<?php

namespace App\Listeners\tenant;

use App\Events\tenant\RegistrarBitacoraTenant;
use App\Models\tenant\Bitacora as TenantBitacora;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

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
        // $navegador = explode(",", request()->header('sec-ch-ua'));
        // $navegador_web = explode(";", $navegador[0]);
        // $navegador = explode(";", $navegador[1]);
        $fecha_cliente = request('fecha_cliente');
        if (is_null($fecha_cliente)) {
            $fecha_cliente = date('Y-m-d H:i:s');
        }
        // $event->request['accion'].', '.PHP_EOL.'Navegador: '.$navegador_web[0].', '.$navegador[0],
        TenantBitacora::create([
            'accion' => $event->request['accion'].'; '.PHP_EOL.
                        'Sistema Operativo: '.request()->header('sec-ch-ua-platform'),
            'fecha' => $fecha_cliente,
            'fecha_server' => date('Y-m-d H:i:s', request()->server('REQUEST_TIME')),
            'ip_maquina' => request()->getClientIp(),
            'users_id' => Auth::user()->id,
        ]);

    }
}
