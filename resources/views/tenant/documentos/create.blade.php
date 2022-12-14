@section('navbar', 'Documentos')
@section('aside-solicitudes', 'py-2.7 bg-blue-500/13')
<x-tenant-app title="documentocreate">

  <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
    <div class="flex-auto p-6">
      <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Registrar Documento</p>
      @error('name')
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>¡Error!</strong> Este documento ya está registrado.
      </div>
      @enderror
      <form action=" {{route( 'tenant.documentos.store', [tenant('id'), $carpetaId ])}} " method="post" 
      enctype="multipart/form-data">
        @csrf
        <div class="flex flex-wrap -mx-3">
          <div class="w-full max-w-full px-3 shrink-0 md:w-12 md:flex-0">
            <div class="mb-4">
              <label for="username" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Archivo (PDF, PNG, JPEG, JPG)</label>
              <input type="file" id="archivo" name="archivo" value="{{ old('archivo') }}" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" 
              @error('archivo') is-invalid @enderror required/>
              @error('archivo')
              <small>{{ $message }}</small>
              <br>
              @enderror
            </div>
          </div>
          <div class="w-full max-w-full px-3 shrink-0 md:w-12 md:flex-0">
            <div class="mb-4">
              <label for="email" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                Descripción
              </label>
              <textarea name="descripcion" id="descripcion" cols="20" rows="5" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" 
              @error('descripcion') is-invalid @enderror required>{{old('descripcion')}}</textarea>
              
              @error('descripcion')
              <small>{{ $message }}</small>
              <br>
              @enderror
            </div>
          </div>
        </div>
        <button class="bg-gradient-to-tl from-blue-500 to-violet-500 text-white px-4 py-2 rounded-full" type="submit">Registrar</button>
        <a class="bg-gradient-to-tl from-red-600 to-violet-500 text-white px-4 py-2 rounded-full" 
        href="{{ route('tenant.solicitudes.show.documents', [tenant('id'), $carpetaId  ]) }}">Volver</a>
      </form>
    </div>
  </div>



  <script></script>
</x-tenant-app>