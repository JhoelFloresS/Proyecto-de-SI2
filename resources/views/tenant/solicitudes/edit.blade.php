@section('navbar', 'Solicitudes')
@section('aside-solicitudes', 'py-2.7 bg-blue-500/13')
<x-tenant-app title="solicitudedit">

  <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
    <div class="flex-auto p-6">
      <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Editar datos de la solicitud de credito</p>
      @error('name')
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>¡Error!</strong> Este usuario ya está registrado.
      </div>
      @enderror
      <form class="row g-3" method="POST" action=" {{route( 'tenant.solicitudes.update', [tenant('id'), $solicitud] )}} ">
        @csrf
        @method('put')
        <div class="flex flex-wrap -mx-3">
          <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
            <label for="rolename" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Cliente</label>
            <div class="mb-4">
              <select name="cliente_id" required id="cliente_id" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" onchange="habilitar()">
                @foreach($clientes as $cliente)
                    @if($cliente->id == $solicitud->cliente_id)
                    <option value="{{ $cliente->id }}" selected> {{ $cliente->user->name }} </option>
                    @else
                    <option value="{{ $cliente->id }}"> {{ $cliente->user->name }} </option>
                    @endif
                @endforeach
              </select>
            </div>
          </div>
          <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
            <label for="rolename" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Credito</label>
            <div class="mb-4">
              <select name="credito_id" required id="credito_id" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" onchange="habilitar()">
                @foreach($creditos as $credito)
                    @if ($credito->id == $solicitud->credito_id)
                    <option value="{{ $credito->id }}" selected> {{ $credito->nombre }} </option>
                    @else
                    <option value="{{ $credito->id }}"> {{ $credito->nombre }} </option>
                    @endif
                @endforeach
              </select>
            </div>
          </div>
          <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
            <div class="mb-4">
              <label for="rolename" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Monto (Bs)</label>
              <input type="text" id="monto" name="monto" required class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" 
              value="{{ old('monto', $solicitud->monto) }}" />
            </div>
          </div>

          <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
            <div class="mb-4">
              <label for="rolename" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Duración (Meses)</label>
              <input type="number" id="duracion" name="duracion" required class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" 
              value="{{ old('duracion', $detalle->duracion) }}" placeholder="12" />
            </div> 
          </div>

          <div class="w-full max-w-full px-3 shrink-0 md:w-12 md:flex-0">
            <div class="mb-4">
              <label for="rolename" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Motivo</label>
              <textarea name="motivo" id="motivo" cols="20" rows="4" 
              required class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" >{{old('motivo', $solicitud->motivo)}}</textarea>
            </div>
          </div>

          <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
            <label for="rolename" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Tasa de interes</label>
            <div class="mb-4">
              <select name="tasa_interes" required id="tasa_interes" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" onchange="habilitar()">
                @if($detalle->tasa_interes == '2.0')
                    <option value="2.0" selected>2%</option>
                    <option value="3.0">3%</option>
                    <option value="5.0">5%</option>
                    <option value="7.0">7%</option>
                @elseif($detalle->tasa_interes == '3.0')
                    <option value="2.0">2%</option>
                    <option value="3.0" selected>3%</option>
                    <option value="5.0">5%</option>
                    <option value="7.0">7%</option>
                @elseif($detalle->tasa_interes = '5.0')
                    <option value="2.0">2%</option>
                    <option value="3.0">3%</option>
                    <option value="5.0" selected>5%</option>
                    <option value="7.0">7%</option>
                @else
                    <option value="2.0">2%</option>
                    <option value="3.0">3%</option>
                    <option value="5.0">5%</option>
                    <option value="7.0" selected>7%</option>
                @endif
                
              </select>
            </div>
          </div>
          <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
            <div class="mb-4">
              <label for="rolename" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nro de cuotas</label>
              <input type="number" id="nro_cuotas" name="nro_cuotas" required class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" 
              value="{{ old('nro_cuotas', $detalle->nro_cuotas) }}" placeholder="12" />
            </div>
          </div>
          <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
            <label for="rolename" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Estado del credito</label>
            <div class="mb-4">
              <select name="estado" required id="estado" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" onchange="habilitar()">
                @if ($solicitud->estado == 'En revisión')
                    <option value="En revisión" selected>En revisión</option>
                    <option value="Aprobado">Aprobado</option>
                @elseif($solicitud->estado == 'Aprobado')
                    <option value="En revisión">En revisión</option>
                    <option value="Aprobado" selected>Aprobado</option>
                @elseif($solicitud->estado == 'En proceso')
                  <option value="En proceso" selected>En proceso</option>
                @else
                <option value="Documentado" selected>Documentado</option>
                @endif
                
              </select>
            </div>
          </div>

          <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
            <label for="rolename" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Pago del credito</label>
            <div class="mb-4">
              <select name="pago_estado" required id="pago_estado" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" onchange="habilitar()">
                @if ($detalle->pago_estado == 'En curso')
                    <option value="En curso" selected>En curso</option>
                    <option value="Pagado">Pagado</option>
                @elseif($detalle->pago_estado == 'Pagado')
                    <option value="En curso">En curso</option>
                    <option value="Pagado" selected>Pagado</option>
                @endif
                
              </select>
            </div>
          </div>
        
        <button class="bg-gradient-to-tl from-blue-500 to-violet-500 text-white px-4 py-2 rounded-full" type="submit">Guardar</button>
        <a class="bg-gradient-to-tl from-red-600 to-violet-500 text-white px-4 py-2 rounded-full" href="{{ route('tenant.solicitudes.index',tenant('id')) }}">Volver</a>
      </form>
    </div>
  </div>

  <script></script>
</x-tenant-app>