
<x-tenant-app title="Bitacora">
    
    <div class="card ">

        <div class="card-body">
            <div class="row">
                <div class="col cold-md-4">
                    <h3> Bitacora </h3>
                    <a href="{{ route('tenant-bitacoras-download-pdf', tenant('id')) }}" 
                            class="btn btn-success mr-3" style="display: inline-block;"> 
                            <i class="bi bi-printer"></i> Exportar a PDF
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
                        <th > {{ $bitacora->id }} </th>
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

    </div>
    
    <script></script>
</x-tenant-app>
