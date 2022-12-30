@section('navbar', 'Roles')
@section('aside-roles', 'py-2.7 bg-blue-500/13')
<x-tenant-app title="roles">
    <!-- <div class="card">
        <div class="card-body">
            <form action="{{route('tenant.roles.update',[tenant('id') ,$role])}}" method="post" novalidate>
                @csrf
                @method('put')
                <label for="name">Ingrese el nombre del Rol</label>
                <input type="text" name="name" class="form-control" value="{{old('name', $role->name)}}"><br>
                @error('name')
                <small class="text-danger">*{{$message}}</small>
                <br><br>
                @enderror


                <label for="permisos">Asignación de permisos</label><br>

                <div class="form-check">
                    <div class="form row">
                        @foreach ($permisos as $permiso)
                        <div class="form-group col-md-3">
                            @if (in_array($permiso->name, $perA))
                            <input type="checkbox" value="{{$permiso->id}}" name="permisos[]" class="form-check-input" checked> {{$permiso->name}} <br>
                            @else
                            <input type="checkbox" value="{{$permiso->id}}" name="permisos[]" class="form-check-input"> {{$permiso->name}} <br>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div> <br>

                <button class="btn btn-dark " type="submit">Actualizar Rol</button>
                <a class="btn btn-danger " href="{{route('tenant.roles',tenant('id'))}}">Volver</a>
            </form>
        </div>
    </div> -->

    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-6">
            <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Editar rol</p>
            @error('name')
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>¡Error!</strong> Este usuario ya está registrado.
            </div>
            @enderror
            <form action="{{ route('tenant.roles.update',[tenant('id'),$role]) }}" method="post">
                @csrf
                @method('put')
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                        <div class="mb-4">
                            <label for="rolename" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nombre del rol</label>
                            <input type="text" name="name" value="{{ old('name',$role->name) }}" required class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                    <label for="rolename" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Asignación de permisos</label>
                        <div class="mb-4">
                            @foreach ($permisos as $permiso)
                            <div class="form-group col-md-3">
                                @if (in_array($permiso->name, $perA))
                                <input type="checkbox" value="{{$permiso->id}}" name="permisos[]" class="form-check-input" checked> {{$permiso->name}} <br>
                                @else
                                <input type="checkbox" value="{{$permiso->id}}" name="permisos[]" class="form-check-input"> {{$permiso->name}} <br>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- <button class="btn btn-dark btn-sm" type="submit">Crear Usuario</button> -->
                <button class="bg-gradient-to-tl from-blue-500 to-violet-500 text-white px-4 py-2 rounded-full" type="submit">Actualizar</button>
                <a class="bg-gradient-to-tl from-red-600 to-violet-500 text-white px-4 py-2 rounded-full" href="{{ route('tenant.roles',tenant('id')) }}">Volver</a>
            </form>
        </div>
    </div>
</x-tenant-app>