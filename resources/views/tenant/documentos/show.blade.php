@section('navbar', 'Documentos')
@section('aside-documentos', 'py-2.7 bg-blue-500/13')
<x-tenant-app title="documentoshow">

  <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
    <div class="flex-auto p-6">

      <div class="flex flex-wrap -mx-3">
        <iframe src="{{$documento->archivo_url}}" style="width:100%; height:700px;" frameborder="0" ></iframe>
      </div>
      <br>
        <a class="bg-gradient-to-tl from-red-600 to-violet-500 text-white px-4 py-2 rounded-full" 
        href="{{ route('tenant.solicitudes.show.documents', [tenant('id'), $carpetaId  ]) }}">Volver</a>
    </div>
  </div>



  <script></script>
</x-tenant-app>