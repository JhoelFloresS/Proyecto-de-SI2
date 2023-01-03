@section('navbar', 'Solicitudes')
@section('aside-solicitudes', 'py-2.7 bg-blue-500/13')
<x-tenant-app title="solicitudshow">


    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">Detalles de credito</h6>
                </div>

                <!-- button crear usuario "a" style css -->
                
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg">
                            <div class="px-6 py-4">
                              <div class="font-bold text-xl mb-2 text-blue-500">Información General</div>
                              <strong>Motivo: </strong>
                              <span class="text-gray-700">{{$solicitud->motivo}}</span> <br>
                              <strong>Monto: </strong>
                              <span class="text-gray-700">{{$solicitud->monto}}</span> <br>
                              <strong>Credito: </strong>
                              <span class="text-gray-700">{{$solicitud->credito->nombre}}</span>
                            </div>
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2 text-blue-500">Información del Solicitante</div>
                                <strong>Nombre: </strong>
                                <span class="text-gray-700">{{$solicitud->cliente->user->name}}</span> <br>
                                <strong>Email: </strong>
                                <span class="text-gray-700">{{$solicitud->cliente->user->email}}</span> <br>
                                <strong>Telefono: </strong>
                                <span class="text-gray-700">{{$solicitud->cliente->user->telefono}}</span>
                                
                            </div>
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2 text-blue-500">Información Especifica</div>
                                <strong>Fecha de inicio: </strong>
                                <span class="text-gray-700">{{$detalle->fecha_inicio}}</span> <br>
                                <strong>Tasa de interes: </strong>
                                <span class="text-gray-700">{{$detalle->tasa_interes}}%</span> <br>
                                <strong>Nro de cuotas: </strong>
                                <span class="text-gray-700">{{$detalle->nro_cuotas}}</span>
                            </div>
                            <div class="px-6 pt-4 pb-2">
                              <a href="{{ route('tenant.solicitudes.index',tenant('id')) }}"class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Volver</a>
                              
                                
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script></script>
</x-tenant-app>