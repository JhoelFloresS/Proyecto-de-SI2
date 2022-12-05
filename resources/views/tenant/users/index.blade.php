<x-tenant-app title="users">
    <div class="card">
        <div class="card-header ">
            <a href="{{ route('tenant.users.create',tenant('id')) }}" class="btn  btn-warning btn-lg">Crear Usuario</a>
        </div>
        <div class="card-body">
            <table id="tabla" class="table table-bordered table-hover dataTable dtr-inline" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre de usuario</th>
                        <th>Correo electronico</th>
                        <th>Rol</th>
                        <th>Departamento</th>
                        <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($usuarios as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->getRoleNames()->first()}}</td>
                            <td>{{$user->departamentos->nombre}}</td>
                            <td class=" text-right" >
                                <form action="{{ route('tenant.users.delete',[tenant('id'),$user]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                        <a href="{{ route('tenant.users.edit',[tenant('id'), $user]) }}" class="btn btn-dark btn-sm">Editar<a>
                              
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')"
                                                value="Borrar">Eliminar</button>
                                 
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</x-tenant-app>