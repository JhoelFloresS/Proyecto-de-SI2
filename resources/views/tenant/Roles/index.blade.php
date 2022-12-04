<x-tenant-app>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <div class="card">
                    <div class="card-body">

                        <a class="btn btn-sm btn-primary" href="{{route('roles.create' ,tenant('id'))}}">nuevo</a>

                        <table class="table table-striped">
                            <thead>
                                <tr>

                                    <th>Rol</th>
                                    <th colspan="2"></th >
                                </tr>
                                <tbody>
                                    @foreach ($roles as $role)
                                            <tr>
                                                <td>{{$role->Id}}</td>
                                                <td>{{$role->name}}</td>
                                                <td width="10px">
                                                    <a class="btn btn-sm btn-primary" href="{{route( 'roles.edit' ,[tenant('id'),$role ])}}">Editar</a>
                                                </td>
                                                <td width="10px">
                                                    <form action="">
                                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                    @endforeach
                                </tbody>
                            </thead>
                        </table>
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</x-tenant-app>