@section('navbar', 'Clientes')
@section('aside-clientes', 'py-2.7 bg-blue-500/13')
<x-tenant-app title="users">
     {{-- <div class="card card-warning">
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
            <form action="{{ route('tenant.users.update',[tenant('id'),$user]) }}" method="post">
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
                <label for="password">Nueva contraseña</label>
                <input type="checkbox" name="activar-contraseña" id="check_password" onclick="cambiarEstado()">
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

                <div>
                    <label for="departamentos">Seleccione un departamento</label>
                    <select name="departamentos" id="departamentos" class="form-control" onchange="habilitar()">
                         <option value="{{old('') }}"></option> 
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

                <button class="btn btn-danger btn-sm" type="submit">Guardar</button>
                <a class="btn btn-dark btn-sm" href="{{ route('tenant.users',tenant('id')) }}">Volver</a>
            </form>

        </div>
    </div> --}}

    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-6">
            <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Editar Cliente</p>
            @error('name')
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>¡Error!</strong> Este usuario ya está registrado.
            </div>
            @enderror
            <form action="{{ route('tenant.clientes.update',[tenant('id'),$user]) }}" method="post">
                @csrf
                @method('put')
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                        <div class="mb-4">
                            <label for="username" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nombre de usuario</label>
                            <input type="text" name="name" value="{{ old('name',$user->name) }}" required class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" required/>
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                        <div class="mb-4">
                            <label for="email" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                Email
                            </label>
                            <input type="email" name="email" value="{{ old('email',$user->email) }}" required class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" required/>
                            @error('email')
                            <small>*{{ $message }}</small>
                            <br><br>
                            @enderror
                        </div>
                    </div>

                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                        <div class="mb-4">
                            <label for="email" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                Telefono
                            </label>
                            <input type="number" name="telefono" value="{{ old('telefono',$user->telefono) }}" required class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            @error('telefono')
                            <small>*{{ $message }}</small>
                            <br><br>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- <button class="btn btn-dark btn-sm" type="submit">Crear Usuario</button> -->
                <button class="bg-gradient-to-tl from-blue-500 to-violet-500 text-white px-4 py-2 rounded-full" type="submit">Guardar</button>
                <a class="bg-gradient-to-tl from-red-600 to-violet-500 text-white px-4 py-2 rounded-full" href="{{ route('tenant.clientes',tenant('id')) }}">Volver</a>
            </form>
        </div>
    </div>

</x-tenant-app>