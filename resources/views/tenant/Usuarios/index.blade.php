<x-tenant-app>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="card">
                        <form action="{{ route('usuarios.index', tenant('id') )}}" method="GET" >
                            <div class="btn-group">
            
                                <input type=" text" name="busqueda" class="form-control" placeholder="ingrese nombre o correo electronico">
                                <input type="submit" value="Buscar" class="btn btn-primary"
                                    style="background-color: var(--color-danger);">
            
                            </div>
                        </form>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                 <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>email</th>
                                        <th>Rol</th>
                                 </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->Name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>@if (!empty($user->getRoleNames()))
                                                    @foreach ($user->getRoleNames() as $rolName)
                                                        <h5><span class="badge badge-dark">{{$rolName}}</span></h5>
                                                    @endforeach                                   
                                                @endif</td>
                                                <td>
                                                <td>
                                                    <a class="btn btn-primary" href="{{route( 'usuarios.edit' ,[tenant('id'), $user])}}">Editar</a>
                                                </td>
                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-tenant-app>