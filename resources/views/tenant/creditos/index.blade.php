@section('navbar', 'Creditos')
@section('aside-creditos', 'py-2.7 bg-blue-500/13')
<x-tenant-app title="credito">

    <!-- <div class="card ">

        <div class="card-body">
            <div class="row">
                <div class="col cold-md-4">
                    <h3> Creditos </h3>
                    <a href="{{ route('tenant.creditos.create', tenant('id')) }}" class="btn btn-success mr-3" style="display: inline-block;">
                        Registrar
                    </a>
                </div>
                <div class="col col-md-8">
                    <div class="input-group mb-4">
                        {{-- <input type="text" class="form-control" placeholder="Buscar" aria-label="Recipient's username"
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
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($creditos as $credito)
                    <tr>
                        <th> {{ $credito->id }} </th>
                        <td class="col-4"> {{ $credito->nombre }} </td>
                        <td> {{ $credito->descripcion }} </td>
                        <th> <a href="{{ route('tenant.creditos.edit',[tenant('id'), $credito]) }}" class="btn btn-warning btn-sm">Editar<a> </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                {{ $creditos->links() }}
            </ul>
        </nav>

    </div> -->

    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">Creditos</h6>
                </div>

                <!-- button crear usuario "a" style css -->
                <a class="bg-gradient-to-tl from-blue-500 to-violet-500 text-white px-4 py-2 rounded-full" style="width: 150px; text-align: center; margin-left: 20px;" href="{{ route('tenant.creditos.create',tenant('id')) }}">Crear Credito</a>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        ID</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Nombre</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Descripcion</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($creditos as $credito)
                                <tr>
                                    <td class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        <div class="flex px-2 py-1">
                                            <div class="flex flex-col justify-center">
                                                <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                                    {{ $credito->id }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                            {{ $credito->nombre }}
                                        </p>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                            {{ $credito->descripcion }}
                                        </p>
                                    </td>


                                    <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <form action="{{ route('tenant.creditos.delete',[tenant('id'),$credito]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <!-- Button  Edit style css-->
                                            <a style="background-color: #4299E1; border: none; color: white; padding: 5px 10px; text-align: center; text-decoration: none; display: inline-block; font-size: 12px; margin: 4px 2px; cursor: pointer;" href="{{ route('tenant.creditos.edit',[tenant('id'), $credito]) }}">Editar</a>
                                            <!-- Button "Delete style css" -->
                                            <button style="background-color: #F56565; border: none; color: white; padding: 5px 10px; text-align: center; text-decoration: none; display: inline-block; font-size: 12px; margin: 4px 2px; cursor: pointer;" onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" value="Borrar">Eliminar</button>
                                        </form>
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