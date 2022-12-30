@extends('central.home')
@section('content')
    <div class="card">
        <div class="card-header ">
            <a href="{{ route('central.planes.create') }}" class="btn  btn-warning btn-lg">Crear Plan</a>
        </div>
        <div class="card-body">
            <table id="tabla" class="table table-bordered table-hover dataTable dtr-inline" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Descuento</th>
                        <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($planes as $plan)
                        <tr>
                            <td>{{ $plan->id }}</td>
                            <td>{{ $plan->nombre }}</td>
                            <td>{{ $plan->descripcion }}</td>
                            <td>{{ $plan->precio}}</td>
                            <td>{{ $plan->descuento}}</td>
                            <td class=" text-right" >
                                <form action="{{ route('central.planes.delete',$plan) }}" method="post">
                                    @csrf
                                    @method('delete')
                                        <a href="{{ route('central.planes.edit', $plan) }}" class="btn btn-dark btn-sm">Editar<a>
                              
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