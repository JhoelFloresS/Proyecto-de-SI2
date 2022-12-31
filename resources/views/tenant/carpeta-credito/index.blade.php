@section('navbar', 'Carpeta Credito')
@section('aside-carpeta-credito', 'py-2.7 bg-blue-500/13')
<x-tenant-app title="carpeta-credito">

    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">Carpeta de Creditos</h6>
                </div>

                <!-- button crear usuario "a" style css -->
                <a class="bg-gradient-to-tl from-blue-500 to-violet-500 text-white px-4 py-2 rounded-full" style="width: 150px; text-align: center; margin-left: 20px;" href="{{ route('tenant.carpeta-credito.create',tenant('id')) }}">Crear carpeta</a>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                            <thead class="align-bottom">
                            </thead class="align-bottom">
                            <tr>
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    ID</th>
                                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Requisito</th>
                                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Cliente</th>
                                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Id solicitud</th>
                                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($carpetaCreditos as $carpetaCredito)
                                <tr>
                                    <td class="px-6 py-3 text-left align-middle border-b border-collapse border-b-solid dark:border-white/40 whitespace-nowrap text-sm">
                                        {{ $carpetaCredito->id }}
                                    </td>
                                    <td class="px-6 py-3 text-left align-middle border-b border-collapse border-b-solid dark:border-white/40 whitespace-nowrap text-sm">
                                        {{ $carpetaCredito->requisito }}
                                    </td>
                                    <td class="px-6 py-3 text-left align-middle border-b border-collapse border-b-solid dark:border-white/40 whitespace-nowrap text-sm">
                                        {{ $carpetaCredito->solicitud->cliente->user->nombre }}
                                    </td>
                                    <td class="px-6 py-3 text-left align-middle border-b border-collapse border-b-solid dark:border-white/40 whitespace-nowrap text-sm">
                                        {{ $carpetaCredito->solicitud_id }}
                                    </td>
                                    <td class="px-6 py-3 text-left align-middle border-b border-collapse border-b-solid dark:border-white/40 whitespace-nowrap text-sm">
                                        <a href="{{ route('tenant.carpeta-credito.show', [$tenant->domain, $carpetaCredito->id]) }}" class="bg-gradient-to-tl from-blue-500 to-violet-500 text-white px-4 py-2 rounded-full" style="width: 150px; text-align: center; margin-left: 20px;">Ver</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-tenant-app>