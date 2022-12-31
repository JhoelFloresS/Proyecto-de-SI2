@section('navbar', 'Solicitudes')
@section('aside-solicitudes', 'py-2.7 bg-blue-500/13')
<x-tenant-app title="solicitudcreate">

  <!-- <div class="card ">
    <div class="card-body ">

      <form class="row g-3" method="POST" action=" {{route( 'tenant.solicitudes.store', tenant('id') )}} ">
        @csrf
        <div class="col-md-6">
          <label for="cliente_id" class="form-label">Cliente</label>
          <select id="cliente_id" class="form-select" name="cliente_id" required>
            <option value="" selected>...</option>
            @foreach($clientes as $cliente)
            <option value="{{ $cliente->id }}"> {{ $cliente->user->name }} </option>
            @endforeach
          </select>
        </div>
        <div class="col-md-6">
          <label for="inputState" class="form-label">Credito</label>
          <select id="credito_id" class="form-select" name="credito_id" required>
            <option value="" selected>...</option>
            @foreach($creditos as $credito)
            <option value="{{ $credito->id }}"> {{ $credito->nombre }} </option>
            @endforeach
          </select>
        </div>
        <div class="col-md-12">
          <label for="monto" class="form-label">Monto</label>
          <input type="text" class="form-control" id="monto" name="monto" required>
        </div>

        <div class="col-12">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>

    </div>
  </div> -->

  <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
    <div class="flex-auto p-6">
      <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Editar rol</p>
      @error('name')
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>¡Error!</strong> Este usuario ya está registrado.
      </div>
      @enderror
      <form class="row g-3" method="POST" action=" {{route( 'tenant.solicitudes.store', tenant('id') )}} ">
        @csrf
        <div class="flex flex-wrap -mx-3">
          <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
            <label for="rolename" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Asignación de permisos</label>
            <div class="mb-4">
              <select name="cliente_id" required id="cliente_id" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" onchange="habilitar()">
                @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}"> {{ $cliente->user->name }} </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
            <label for="rolename" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Asignación de permisos</label>
            <div class="mb-4">
              <select name="credito_id" required id="credito_id" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" onchange="habilitar()">
                @foreach($creditos as $credito)
                <option value="{{ $credito->id }}"> {{ $credito->nombre }} </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
            <div class="mb-4">
              <label for="rolename" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Monto</label>
              <input type="text" id="monto" name="monto" required required class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
            </div>
          </div>
        </div>
        <!-- <button class="btn btn-dark btn-sm" type="submit">Crear Usuario</button> -->
        <button class="bg-gradient-to-tl from-blue-500 to-violet-500 text-white px-4 py-2 rounded-full" type="submit">Crear</button>
        <a class="bg-gradient-to-tl from-red-600 to-violet-500 text-white px-4 py-2 rounded-full" href="{{ route('tenant.solicitudes.index',tenant('id')) }}">Volver</a>
      </form>
    </div>
  </div>

  <script></script>
</x-tenant-app>