@extends('central.home')
@section('content')
    <div class="card">
        <div class="card-header ">
            <a href="{{ route('central.tenants.create') }}" class="btn  btn-warning btn-lg">Crear tenant</a>
        </div>
        <div class="card-body">
            <table id="tabla" class="table table-bordered table-hover dataTable dtr-inline" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Empresa</th>
                        <th>Correo electronico</th>
                        <th>Logo</th>
                        <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($tenants as $tenant)
                        <tr>
                            <td>{{ $tenant->id }}</td>
                            <td>{{ $tenant->name }}</td>
                            <td>{{ $tenant->email }}</td>
                            <td>{{ $tenant->logo}}</td>
                            <td class=" text-right" >
                                <form action="{{ route('central.tenants.delete',$tenant) }}" method="post">
                                    @csrf
                                    @method('delete')
                                        <a href="{{ route('central.tenants.edit', $tenant) }}" class="btn btn-dark btn-sm">Editar<a>
                              
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
@endsection