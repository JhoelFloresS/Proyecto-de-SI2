@section('navbar', 'Solicitudes')
@section('aside-solicitudes', 'py-2.7 bg-blue-500/13')
<x-tenant-app title="solicitudcreate">

    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-6">
            <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Editar solicitud</p>
            @error('name')
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>¡Error!</strong> Este usuario ya está registrado.
            </div>
            @enderror
            <form class="row g-3" method="post" action=" {{route( 'tenant.solicitudes.update', [tenant('id'),$solicitud] )}} ">
                @csrf
                @method('put')
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                        <label for="rolename" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Cliente</label>
                        <div class="mb-4">
                            <select name="cliente_id" required id="cliente_id" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" onchange="habilitar()">
                                <option value="{{old('clientes', $cliente_id->cliente_id) }}">{{ $solicitud->cliente->user->name}}</option>
                                @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}"> {{ $cliente->user->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                        <label for="rolename" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Credito</label>
                        <div class="mb-4">
                            <select name="credito_id" required id="credito_id" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" onchange="habilitar()">
                                <option value="{{old('creditos', $credito_id->credito_id) }}">{{ $solicitud->credito->nombre}}</option>
                                @foreach($creditos as $credito)
                                <option value="{{ $credito->id }}"> {{ $credito->nombre }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                        <div class="mb-4">
                            <label for="monto" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Monto</label>
                            <input type="text" value="{{ old('monto',$solicitud->monto) }}" id="monto" name="monto" required required class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                        </div>
                    </div>
                </div>
                <!-- <button class="btn btn-dark btn-sm" type="submit">Crear Usuario</button> -->
                <button class="bg-gradient-to-tl from-blue-500 to-violet-500 text-white px-4 py-2 rounded-full" type="submit">Editar</button>
                <a class="bg-gradient-to-tl from-red-600 to-violet-500 text-white px-4 py-2 rounded-full" href="{{ route('tenant.solicitudes.index',tenant('id')) }}">Volver</a>
            </form>
        </div>
    </div>

</x-tenant-app>