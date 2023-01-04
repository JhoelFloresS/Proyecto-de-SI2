@section('navbar', 'Solicitudes')
@section('aside-solicitudes', 'py-2.7 bg-blue-500/13')
<x-tenant-app title="solicitud">


    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">Solicitudes de credito</h6>
                </div>

                <!-- button crear usuario "a" style css -->
                <a class="bg-gradient-to-tl from-blue-500 to-violet-500 text-white px-4 py-2 rounded-lg shadow-md" style="width: 150px; text-align: center; margin-left: 20px;" href="{{ route('tenant.solicitudes.create',tenant('id')) }}">Crear solicitud</a>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        ID</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Cliente</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Credito</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Monto</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Estado</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Opciones</th>
                                        
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($solicitudes as $solicitud)
                                <tr>
                                    <td class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        <div class="flex px-2 py-1">
                                            <div class="flex flex-col justify-center">
                                                <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                                    {{ $solicitud->id }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                            {{ $solicitud->cliente->user->name}}
                                        </p>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                            {{ $solicitud->credito->nombre }}
                                        </p>
                                    </td>
                                    <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                            {{ $solicitud->monto }}
                                        </p>
                                    </td>
                                    <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        @if ($solicitud->estado == 'En proceso')
                                            <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-gray-200 bg-blue-500 rounded-lg">
                                                {{ $solicitud->estado }}
                                            </p>
                                        @elseif($solicitud->estado == 'En revisión')
                                            <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-gray-700 bg-yellow-500 rounded-lg">
                                                {{ $solicitud->estado }}
                                            </p>
                                        @elseif($solicitud->estado == 'Aprobado')
                                            <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-gray-200 bg-green-500 rounded-lg">
                                                {{ $solicitud->estado }}
                                            </p>
                                        @else
                                            <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-gray-200 bg-red-500 rounded-lg">
                                                {{ $solicitud->estado }}
                                            </p>
                                        @endif
                                        
                                        
                                    </td>
                                    <td class="px-6 py-3 font-bold text-center items-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid">
                                        <div class="flex justify-center">
                                            <a class="px-1" href="{{ route('tenant.solicitudes.show.documents',[tenant('id'), $solicitud->id]) }}">
                                                <button type="button" title="Carpeta de documentos">
                                                    <span class="material-symbols-outlined">folder</span>
                                                </button>
                                            </a>
                                            <a class="px-1"  href="{{ route('tenant.solicitudes.show',[tenant('id'), $solicitud]) }}">
                                                <button type="button" title="Ver">
                                                    <span class="material-symbols-outlined">visibility</span>
                                                </button>
                                            </a>
                                            <form action="{{ route('tenant.solicitudes.delete',[tenant('id'),$solicitud]) }}" method="post">
                                                @csrf
                                                @method('delete') 
                                                <!-- Button  Edit style css-->
                                                <a class="px-1" href="{{ route('tenant.solicitudes.edit',[tenant('id'), $solicitud]) }}">
                                                    <button type="button" title="Editar">
                                                        <span class="material-symbols-outlined">edit</span>
                                                    </button>
                                                </a>
                                                <!-- Button "Delete style css" -->
                                                <button  title="Eliminar"  onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" value="Borrar">
                                                    <span class="material-symbols-outlined">delete</span>
                                                </button>
                                            </form>
                                        </div>
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

    <script></script>
</x-tenant-app>