<x-tenant-app>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open(array('route'=>['roles.store', tenant('id')], 'method'=>'POST'))!!}
                                <div class="form-group">
                                    {!!Form::label('name', 'Nombre')!!}
                                    {!!Form::text('name', null, ['class'=>'form-control','placeholder'=>'ingrese el nombre del rol'])!!}
                                </div>
                               @error('name')
                                    <small class="text-danger ">
                                        {{$message}}
                                    </small>
                               @enderror
        
                                <h2 class="h3">Lista de permisos</h2>
                                @foreach ($permissions as $permission)
                                    <div>
                                        <label >
                                            {!!Form::checkbox('permissions[]', $permission->id, null, ['class' =>'mr-1'])!!}
                                            {{$permission->description}}
                                        </label>
                                    </div>
                                @endforeach
                            {!! Form::submit('Crear Rol', ['class' => 'btn btn-primary'])!!}  

                            {!! Form::close()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-tenant-app>