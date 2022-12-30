@section('navbar', 'Bitacora')
@section('aside-bitacora', 'py-2.7 bg-blue-500/13')
<x-tenant-app title="Bitacora">

    <!-- <div class="card ">

        <div class="card-body">
            <div class="row">
                <div class="col cold-md-4">
                    <h3> Bitacora </h3>
                    <a href="{{ route('tenant-bitacoras-download-pdf', tenant('id')) }}" class="btn btn-success mr-3" style="display: inline-block;">
                        <i class="bi bi-printer"></i> Exportar a PDF
                    </a>
                </div>
                <div class="col col-md-8">
                    <div class="input-group mb-4">
                        {{-- <input type="text" class="form-control" placeholder="Buscar" aria-label="Recipient's bitacoraname"
                            aria-describedby="basic-addon2">
                        <button class="btn btn-primary" style="display: inline-block;">Buscar</button> --}}

                    </div>
                </div>
            </div>
            <hr>
        </div>

        <div class="card-body ">
            <table class="table table-hover">
                {{-- table-bordered-button border-dark --}}
                <thead class="table table-responsive">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Acción</th>
                        <th scope="col">Fecha Cliente</th>
                        <th scope="col">Fecha Servidor</th>
                        <th scope="col">Ip maquina</th>
                        <th scope="col">Usuario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bitacoras as $bitacora)
                    <tr>
                        <th> {{ $bitacora->id }} </th>
                        <td class="col-4"> {{ $bitacora->accion }} </td>
                        <td> {{ $bitacora->fecha }} </td>
                        <td> {{ $bitacora->fecha_server }} </td>
                        <td> {{ $bitacora->ip_maquina}} </td>
                        <td> {{ $bitacora->user->name }} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                {{ $bitacoras->links() }}
            </ul>
        </nav>

    </div> -->

    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">Bitacoras</h6>
                </div>
                <!-- button crear usuario "a" style css -->
                <a class="bg-gradient-to-tl from-blue-500 to-violet-500 text-white px-4 py-2 rounded-full" style="width: 150px; text-align: center; margin-left: 20px;" href="{{ route('tenant-bitacoras-download-pdf', tenant('id')) }}">Descargar PDF</a>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        ID</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Accion</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Fecha Cliente</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Fecha Servidor</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Ip maquina</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Usuario
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bitacoras as $bitacora)
                                <tr>
                                    <td class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        <div class="flex px-2 py-1">
                                            <div class="flex flex-col justify-center">
                                                <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                                    {{ $bitacora->id }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                            {{ $bitacora->accion }}
                                        </p>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                            {{ $bitacora->fecha }}
                                        </p>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                            {{ $bitacora->fecha_server }}
                                        </p>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                            {{ $bitacora->ip_maquina }}
                                        </p>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                            {{ $bitacora->user->name }}
                                        </p>
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