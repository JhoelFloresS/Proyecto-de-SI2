@extends('central.home')
@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Crear Tenant</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('central.tenants.update',$tenant) }}" method="post">
                @csrf
                @method('put')
                <label for="id">Ingrese Id</label>
                <input type="text" name="id" class="form-control" value="{{ old('id',$tenant->id) }}" required>
                @error('id')
                    <small>*{{ $message }}</small>
                    <br><br>
                @enderror
                <br>

                <label for="name">Ingrese el nombre </label>
                <input type="text" name="name" class="form-control" value="{{ old('name',$tenant->name) }}" required>
                @error('name')
                    <small>*{{ $message }}</small>
                    <br><br>
                @enderror
                <br>
                <label for="direccion">direccion</label>
                <input type="text" name="direccion" class="form-control" value="{{ old('direccion',$tenant->direccion) }}" >
                @error('direccion')
                    <small>*{{ $message }}</small>
                    <br><br>
                @enderror
                <br>
                <label for="email">email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email',$tenant->email) }}" required>
                @error('email')
                    <small>*{{ $message }}</small>
                    <br><br>
                @enderror
                <br>

                <label for="logo">Logo</label>
                <input type="text" name="logo" class="form-control" value="{{ old('logo',$tenant->logo) }}" >
                @error('logo')
                    <small>*{{ $message }}</small>
                    <br><br>
                @enderror
                <br>

                <label for="pagina_web">pagina web</label>
                <input type="text" name="logo" class="form-control" value="{{ old('pagina_web',$tenant->pagina_web) }}" >
                @error('pagina_web')
                    <small>*{{ $message }}</small>
                    <br><br>
                @enderror
                <br>

                <button class="btn btn-dark btn-sm" type="submit">Guardar</button>
                <a class="btn btn-danger btn-sm" href="{{ route('central.tenants') }}">Volver</a>
            </form>

        </div>
    </div>
@endsection