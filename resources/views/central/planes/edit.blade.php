@extends('central.home')
@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Editar Plan</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('central.planes.update',$plan) }}" method="post">
                @csrf
                @method('put')
                <label for="name">Ingrese el nombre del plan</label>
                <input type="text" name="name" class="form-control" value="{{ old('name',$plan->nombre) }}" required>
                @error('name')
                    <small>*{{ $message }}</small>
                    <br><br>
                @enderror
                <br>

                <label for="descripcion">Descripcion</label>
                <input type="text" name="descripcion" class="form-control" value="{{ old('descripcion',$plan->descripcion) }}" required>
                @error('descripcion')
                    <small>*{{ $message }}</small>
                    <br><br>
                @enderror
                <br>
                <label for="precio">Precio</label>
                <input type="number" name="precio" class="form-control" value="{{ old('precio',$plan->precio) }}" required>
                @error('precio')
                    <small>*{{ $message }}</small>
                    <br><br>
                @enderror
                <br>

                <label for="descuento">Ingrese un monto de descuento</label>
                <input type="number" name="descuento" class="form-control" value="{{ old('descuento',$plan->descuento) }}" >
                @error('descuento')
                    <small>*{{ $message }}</small>
                    <br><br>
                @enderror
                <br>

                <button class="btn btn-dark btn-sm" type="submit">Guardar</button>
                <a class="btn btn-danger btn-sm" href="{{ route('central.planes') }}">Volver</a>
            </form>

        </div>
    </div>
@endsection