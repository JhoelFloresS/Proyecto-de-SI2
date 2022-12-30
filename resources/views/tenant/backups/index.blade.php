@section('navbar', 'Backups')
@section('aside-backup', 'py-2.7 bg-blue-500/13')
<x-tenant-app title="backups">

    <!-- <div class="card">
        <div class="card-header " style="">
            Crear Backup de la base de datos
        </div>
        <div class="card-body ">
            <div class="row ">
                <form action="{{route('tenant.backups.crear',tenant('id'))}}" method="post" novalidate>
                    @csrf
                    <label>Elija las tablas que desee guardar</label><br>
                    <h6 class="text-info ">si no selecciona ninguna tabla se creara un bakupcs con todas las tablas</h6>
                    <div class="form-check " name="form-check">
                        @foreach ($tablas as $tabla)
                        <div class="form-row">
                            <input type="checkbox" value="{{$tabla}}" name="tablas[]" class="form-check-input"> {{$tabla}} <br>
                        </div>
                        @endforeach
                        <br>
                    </div> <br>
                    <button class="btn btn-dark " type="submit">Crear Backups</button>
                </form>
            </div>
        </div>
    </div> -->

    @can('backups')
    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-6">
            <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Backup</p>
            <label for="rolename" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Elija las tablas que desee guardar</label>
            <form action="{{route('tenant.backups.crear',tenant('id'))}}" method="post" novalidate>
                <label for="rolename" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Si no selecciona ninguna tabla se creara un bakupcs con todas las tablas</label>
                @csrf
                <div class="form-check " name="form-check">
                    @foreach ($tablas as $tabla)
                    <div class="form-row">
                        <input type="checkbox" value="{{$tabla}}" name="tablas[]" class="form-check-input"> {{$tabla}} <br>
                    </div>
                    @endforeach
                    <br>
                </div>
                <button class="bg-gradient-to-tl from-blue-500 to-violet-500 text-white px-4 py-2 rounded-full" type="submit">Crear Backup</button>
            </form>
        </div>
    </div>
    @endcan
    <script></script>
</x-tenant-app>