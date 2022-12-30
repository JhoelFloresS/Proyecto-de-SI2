
<x-tenant-app title="solicitud">
    
    <div class="card ">

        <div class="card-body">
            <div class="row">
                <div class="col cold-md-4">
                    <h3> Solicitudes de credito </h3>
                    <a href="{{ route('tenant.solicitudes.create', tenant('id')) }}" 
                    class="btn btn-success mr-3" style="display: inline-block;"> 
                        Registrar
                    </a>
                </div>
                <div class="col col-md-8">
                    <div class="input-group mb-4">
              
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
                        <th scope="col">Cliente</th>
                        <th scope="col">Credito</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Monto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($solicitudes as $solicitud)
                    <tr>
                        <th > {{ $solicitud->id }} </th>
                        <td> {{ $solicitud->cliente->user->name}} </td>
                        <td> {{ $solicitud->credito->nombre }} </td>
                        <td> {{ $solicitud->fecha_hora }} </td>
                        <td> {{ $solicitud->monto }} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                @if($solicitudes)
                    {{ $solicitudes->links() }}
                @endif
            </ul>
        </nav>

    </div>
    
    <script></script>
</x-tenant-app>
