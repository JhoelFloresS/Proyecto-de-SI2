@section('navbar', 'Usuarios')
@section('aside-usuarios', 'py-2.7 bg-blue-500/13')
<x-tenant-app title="users">
    <!-- <div class="card card-warning">
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
    </div> -->
    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-6">
            <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Registrar Usuario</p>
            @error('name')
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>¡Error!</strong> Este usuario ya está registrado.
            </div>
            @enderror
            <form action="{{ route('tenant.users.store',tenant('id')) }}" method="post">
                @csrf
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                        <div class="mb-4">
                            <label for="username" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nombre de usuario</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                        <div class="mb-4">
                            <label for="email" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                Email
                            </label>
                            <input type="email" name="email" value="{{ old('email') }}" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            @error('email')
                            <small>*{{ $message }}</small>
                            <br><br>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                        <div class="mb-4">
                            <label for="password" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                Contraseña
                            </label>
                            <input type="password" name="password" value="{{ old('password') }}" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            @error('password')
                            <small>*{{ $message }}</small>
                            <br><br>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                        <div class="mb-4">
                            <label for="last name" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                Rol
                            </label>
                            <!-- <input type="text" name="last name" value="Lucky" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" /> -->
                            <select name="roles" id="select-roles" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" onchange="habilitar()">
                                @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                                @endforeach
                            </select>
                            @error('roles')
                            <small>*{{ $message }}</small>
                            <br><br>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                        <div class="mb-4">
                            <label for="last name" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                Departamento
                            </label>
                            <!-- <input type="text" name="last name" value="Lucky" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" /> -->
                            <!-- <select name="roles" id="select-roles" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" onchange="habilitar()"> -->
                            <select name="departamentos" id="select-roles" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" onchange="habilitar()" onchange="habilitar()">
                                @foreach ($departamentos as $departamento)
                                <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                                @endforeach
                            </select>
                            @error('departamentos')
                            <small>*{{ $message }}</small>
                            <br><br>
                            @enderror
                            </select>
                        </div>
                    </div>
                </div>
                <!-- <button class="btn btn-dark btn-sm" type="submit">Crear Usuario</button> -->
                <button class="bg-gradient-to-tl from-blue-500 to-violet-500 text-white px-4 py-2 rounded-full" type="submit">Crear Usuario</button>
                <a class="bg-gradient-to-tl from-red-600 to-violet-500 text-white px-4 py-2 rounded-full" href="{{ route('tenant.users',tenant('id')) }}">Volver</a>
            </form>
        </div>
    </div>
</x-tenant-app>