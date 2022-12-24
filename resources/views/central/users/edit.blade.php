@extends('central.home')
@section('content')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Editar Usuario</h3>
    </div>
    <div class="card-body">
        @error('name')
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>¡Error!</strong> Este usuario ya está registrado.
            </div>
        @enderror
        <form action="{{ route('central.users.update',$user) }}"  method="post">
            @csrf
            @method('put')
            <label for="name">Ingrese el nombre de usuario</label>
            <input type="text" name="name" class="form-control" value="{{ old('name',$user->name) }}" required>

            <br>
            <label for="email">Ingrese el correo electronico</label>
            <input type="text" name="email" class="form-control" value="{{ old('email',$user->email) }}" required>
            @error('email')
                <small>*{{ $message }}</small>
                <br><br>
            @enderror
            <br>
            <label for="password">Nueva  contraseña</label>
            <input type="checkbox" name="activar-contraseña" id="check_password" onclick="cambiarEstado()" >
                    <input type="password" name="password" class="form-control" value="{{old('password')}}" id="passwordInput" placeholder="Escriba la nueva contraseña" disabled>

            <br>


            <div>
                <label for="roles">Seleccione un rol</label>
                <select name="roles" id="select-roles" class="form-control" onchange="habilitar()">
                    <option value="{{old('roles', $role_id->role_id) }}">{{ $user->getRoleNames()->first() }}</option>
                    @foreach ($roles as $rol)
                        <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                    @endforeach
                </select>
                @error('roles')
                    <small>*{{ $message }}</small>
                    <br><br>
                @enderror
                <br>
            </div>
            <br>

            <button class="btn btn-danger btn-sm" type="submit">Guardar</button>
            <a class="btn btn-dark btn-sm" href="{{ route('central.users') }}">Volver</a>
        </form>

    </div>
</div>

<script>
    var contra = document.getElementById('passwordInput');
    function cambiarEstado(){
    if(contra.disabled == true){
        contra.disabled = false
    }else{
    if(contra.disabled == false){
        contra.disabled = true
        contra.value = ''
    }
    }

    
    }
   
</script>

@endsection