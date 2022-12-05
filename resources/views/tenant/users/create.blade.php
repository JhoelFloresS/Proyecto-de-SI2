<x-tenant-app title="users">
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Registrar Usuario</h3>
        </div>
        <div class="card-body">
            @error('name')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>¡Error!</strong> Este usuario ya está registrado.
                </div>
            @enderror
            <form action="{{ route('tenant.users.store',tenant('id')) }}" method="post">
                @csrf
                <label for="name">Ingrese el nombre de usuario</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>

                <br>
                <label for="email">Ingrese el correo electronico</label>
                <input type="text" name="email" class="form-control" value="{{ old('email') }}" required>
                @error('email')
                    <small>*{{ $message }}</small>
                    <br><br>
                @enderror
                <br>
                <label for="password">Ingrese la contraseña</label>
                <input type="password" name="password" class="form-control" value="{{ old('password') }}" required>
                @error('password')
                    <small>*{{ $message }}</small>
                    <br><br>
                @enderror
                <br>

                <div>
                    <label for="roles">Seleccione un rol</label>
                    <select name="roles" id="select-roles" class="form-control" onchange="habilitar()">
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

                <div>
                    <label for="departamentos">Seleccione un departamento</label>
                    <select name="departamentos" id="select-roles" class="form-control" onchange="habilitar()">
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                        @endforeach
                    </select>
                    @error('departamentos')
                        <small>*{{ $message }}</small>
                        <br><br>
                    @enderror
                    <br>
                </div>
                <br>

                <button class="btn btn-dark btn-sm" type="submit">Crear Usuario</button>
                <a class="btn btn-danger btn-sm" href="{{ route('tenant.users',tenant('id')) }}">Volver</a>
            </form>

        </div>
    </div>
</x-tenant-app>