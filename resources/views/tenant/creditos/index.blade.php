
<x-tenant-app title="credito">
    
    <div class="card ">

        <div class="card-body">
            <div class="row">
                <div class="col cold-md-4">
                    <h3> Creditos </h3>
                    <a href="{{ route('tenant.creditos.create', tenant('id')) }}" 
                    class="btn btn-success mr-3" style="display: inline-block;"> 
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
                        <th > {{ $credito->id }} </th>
                        <td class="col-4"> {{ $credito->nombre }} </td>
                        <td> {{ $credito->descripcion }} </td>
                        <th> <a href="{{ route('tenant.creditos.edit',[tenant('id'), $credito]) }}" 
                            class="btn btn-warning btn-sm">Editar<a> </th>
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

    </div>
    
    <script></script>
</x-tenant-app>
