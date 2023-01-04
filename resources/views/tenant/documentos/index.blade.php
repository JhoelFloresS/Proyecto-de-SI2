@section('navbar', 'Documentos')
@section('aside-solicitudes', 'py-2.7 bg-blue-500/13')
<x-tenant-app title="documento">

    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">Documentos</h6>
                </div>
                
                <!-- button crear usuario "a" style css -->
                <a class="bg-gradient-to-tl from-blue-500 to-violet-500 text-white px-4 py-2 rounded-lg shadow-md" style="width: 120px; text-align: center; margin-left: 20px;" href="{{ route('tenant.documentos.create',[tenant('id'), $carpetaId ]) }}">+ Agregar</a>
                
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        ID</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Formato</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Descripcion</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Fecha de subida</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Estado</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documentos as $documento)
                                <tr>
                                    <td class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        <div class="flex px-2 py-1">
                                            <div class="flex flex-col justify-center">
                                                <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                                    {{ $documento->id }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        {{-- <a class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400" href="{{ $documento->archivo_url }}" >
                                            @if($documento->formato == 'pdf')
                                                <span class="material-symbols-outlined">picture_as_pdf</span>
                                            @else
                                            <span class="material-symbols-outlined">image</span>  
                                            @endif
                                            
                                            {{ $documento->archivo_url }} 
                                        </a> --}}
                                        <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-gray-600 uppercase">
                                            {{ $documento->formato}}
                                        </p>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        {{-- <iframe src="{{$documento->archivo_url}}" style="width:80px; height:80px;" frameborder="0" ></iframe> --}}
                                        <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                            {{ $documento->descripcion }}
                                        </p>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        {{-- <iframe src="{{$documento->archivo_url}}" style="width:80px; height:80px;" frameborder="0" ></iframe> --}}
                                        <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                            {{ $documento->fecha_hora }}
                                        </p>
                                    </td>
                                    <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        @if($documento->estado == 'En revisión')
                                            <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-gray-700 bg-yellow-500 rounded-lg">
                                                {{$documento->estado}}
                                            </p>
                                        @else
                                            <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-gray-200 bg-green-500 rounded-lg">
                                                {{ $documento->estado }}
                                            </p>
                                        @endif
                                    </td>

                                    <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <form action="{{ route('tenant.documentos.delete',[tenant('id'),$documento]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a class="px-1" href="{{ route('tenant.documentos.show',[tenant('id'), $documento, $carpetaId]) }}">
                                                <button type="button" title="Ver">
                                                    <span class="material-symbols-outlined">visibility</span>
                                                </button>
                                            </a>
                                            <!-- Button  Edit style css-->
                                            <a class="px-1" href="{{ route('tenant.documentos.edit',[tenant('id'), $documento, $carpetaId]) }}">
                                                <button type="button" title="Editar">
                                                    <span class="material-symbols-outlined">edit</span>
                                                </button>
                                            </a>
                                            <!-- Button "Delete style css" -->
                                            <button class="px-1" title="Eliminar"  onclick="return confirm('¿ESTÁ SEGURO DE ELIMINAR EL DOCUMENTO?')" value="Borrar">
                                                <span class="material-symbols-outlined">delete</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <a class=" inline-block bg-gradient-to-tl from-red-600 to-violet-500 text-white px-3 py-1 rounded-lg mr-2 mb-2"  href="{{ route('tenant.solicitudes.index',tenant('id')) }}">Volver</a>
                </div>
                
                
            </div>
        </div>
    </div>

    <script></script>
</x-tenant-app>