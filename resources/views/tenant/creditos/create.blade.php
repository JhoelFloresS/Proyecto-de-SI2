@section('navbar', 'Creditos')
@section('aside-creditos', 'py-2.7 bg-blue-500/13')
<x-tenant-app title="creditocreate">

  <!-- <div class="card ">
    <div class="card-body ">

      <form class="row g-3" method="POST" action=" {{route( 'tenant.creditos.store', tenant('id') )}} ">
        @csrf
        <div class="col-12">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}" required>
        </div>
        <div class="col-12">
          <label for="descripcion" class="form-label">Descripción</label>
          <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control" required> {{ old('descripcion') }} </textarea>

        </div>

        <div class="col-12">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>

    </div>
  </div> -->

  <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
    <div class="flex-auto p-6">
      <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Registrar Credito</p>
      @error('name')
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>¡Error!</strong> Este credito ya está registrado.
      </div>
      @enderror
      <form action=" {{route( 'tenant.creditos.store', tenant('id') )}} " method="post">
        @csrf
        <div class="flex flex-wrap -mx-3">
          <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
            <div class="mb-4">
              <label for="username" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nombre de credito</label>
              <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
            </div>
          </div>
          <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
            <div class="mb-4">
              <label for="email" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                Descripción
              </label>
              <input type="text" name="descripcion" id="descripcion" value="{{ old('descripcion') }}" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" required/>
              @error('descripcion')
              <small>*{{ $descripcion }}</small>
              <br><br>
              @enderror
            </div>
          </div>
        </div>
        <!-- <button class="btn btn-dark btn-sm" type="submit">Crear Usuario</button> -->
        <button class="bg-gradient-to-tl from-blue-500 to-violet-500 text-white px-4 py-2 rounded-full" type="submit">Crear Credito</button>
        <a class="bg-gradient-to-tl from-red-600 to-violet-500 text-white px-4 py-2 rounded-full" href="{{ route('tenant.creditos.index',tenant('id')) }}">Volver</a>
      </form>
    </div>
  </div>



  <script></script>
</x-tenant-app>