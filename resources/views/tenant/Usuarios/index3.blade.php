<x-tenant-app>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('usuarios.index', tenant('id') )}}" method="GET" >
                        <div class="btn-group">
        
                            <input type=" text" name="busqueda" class="form-control" placeholder="ingrese nombre o correo electronico">
                            <input type="submit" value="Buscar" class="btn btn-primary"
                                style="background-color: var(--color-danger);">
        
                        </div>
                    </form>
                    <a class= "btn btn-warning" href="{{route('usuarios.create' ,tenant('id'))}}">Nuevo</a>
                    <table class= "table table - striped mt-2">
                        <thead style="background-color #6777ef; ">
                            <th style="display: none;">ID</th>
                            <th style="color: rgb(10, 110, 152);">Nombre</th>
                            <th style="color: rgb(10, 110, 152);">E-mail</th>
                            <th style="color: rgb(10, 110, 152);">Rol</th>
                            <th style="color: rgb(10, 110, 152);">Estado</th>
                            <th style="color: rgb(10, 110, 152);">acciones</th>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td style="display: none;">{{$usuario->id}}</td>
                                    <td>{{$usuario->name}}</td>
                                    <td>{{$usuario->email}}</td> 
                                    <td>@if (!empty($usuario->getRoleNames()))
                                        @foreach ($usuario->getRoleNames() as $rolName)
                                            <h5><span class="badge badge-dark">{{$rolName}}</span></h5>
                                        @endforeach                                   
                                    @endif</td>
                                    <td>
                                        activo
                                    </td>
                                    <td>
                                        <a class="btn btn-info" href="{{route( 'usuarios.edit' ,[tenant('id'),$usuario->id ])}}">Editar</a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $usuarios->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-tenant-app>
