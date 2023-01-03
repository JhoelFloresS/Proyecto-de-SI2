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
      <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Nueva solicitud de credito</p>
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
            <label for="rolename" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Cliente</label>
            <div class="mb-4">
              <select name="cliente_id" required id="cliente_id" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" onchange="habilitar()">
                <option value="" selected>....</option>
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
                <option value="" selected>....</option>
                @foreach($creditos as $credito)
                <option value="{{ $credito->id }}"> {{ $credito->nombre }} </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
            <div class="mb-4">
              <label for="rolename" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Monto (Bs)</label>
              <input type="text" id="monto" name="monto" required class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" 
              value="{{ old('monto') }}" />
            </div>
          </div>
          <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
            <div class="mb-4">
              <label for="rolename" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Fecha de finalización</label>
              <input type="date" id="fecha_fin" name="fecha_fin" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
            </div>
          </div>

          <div class="w-full max-w-full px-3 shrink-0 md:w-12 md:flex-0">
            <div class="mb-4">
              <label for="rolename" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Motivo</label>
              <textarea name="motivo" id="motivo" cols="20" rows="4" 
              required class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" >{{old('motivo')}}</textarea>
            </div>
          </div>

          <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
            <label for="rolename" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Tasa de interes</label>
            <div class="mb-4">
              <select name="tasa_interes" required id="tasa_interes" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" onchange="habilitar()">
                <option value="">....</option>
                <option value="2.0">2%</option>
                <option value="3.0">3%</option>
                <option value="5.0">5%</option>
                <option value="7.0">7%</option>
              </select>
            </div>
          </div>
          <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
            <div class="mb-4">
              <label for="rolename" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nro de cuotas</label>
              <input type="number" id="nro_cuotas" name="nro_cuotas" required class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" 
              value="{{ old('nro_cuotas') }}" placeholder="4" />
            </div>
          </div>

        <button class="bg-gradient-to-tl from-blue-500 to-violet-500 text-white px-4 py-2 rounded-full" type="submit">Crear</button>
        <a class="bg-gradient-to-tl from-red-600 to-violet-500 text-white px-4 py-2 rounded-full" href="{{ route('tenant.solicitudes.index',tenant('id')) }}">Volver</a>
      </form>
    </div>
  </div>

  <script></script>
</x-tenant-app>