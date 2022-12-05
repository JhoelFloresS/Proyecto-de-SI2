<x-tenant-app title="roles">
    <div class="card">
        <div class="card-header">
            <a href="{{route('tenant.roles.create',tenant('id'))}}" class="btn btn-warning btn-lg">Crear Rol</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover dataTable dtr-inline" id="tabla" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre de Rol</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
    
                <tbody>
                    @foreach ($roles as $rol)
                        <tr>
                            <td>{{$rol->id}}</td>
                            <td>{{$rol->name}}</td>                            
                            <td >
                            
                                <form action="{{route('tenant.roles.delete',[tenant('id'),$rol])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    
                                    <a href="{{route('tenant.roles.edit',[tenant('id'),$rol])}}"  class="btn btn-dark btn-dm">Editar</a>
                                  
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar">Eliminar</button>                                    
                                   
                                </form>
                            
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-tenant-app>
