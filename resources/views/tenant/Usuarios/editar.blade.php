<x-tenant-app>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('info'))
                        <div class="alert alert-success">
                            <strong>{{session('info')}}</strong>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <p class="h5">Nombre:</p>
                            <p class="form-control">{{$user->name}}</p>


                            <h2 class="h5">Listado de roles</h2>
                            {!! Form::model($user, ['route'=>['usuarios.update', tenant('id'), $user->id], 'method'=>'PUT'])!!}
                            @foreach ($roles as $role)
                                    <div>
                                        <label>
                                            {!!Form::checkbox('roles[]', $role->id, null,['class'=>'mr-1'])!!}
                                            {{$role->name}}
                                        </label>
                                    </div>
                             @endforeach


                                {!!form::submit('asignar rol', ['class'=>'btn btn-primary mt-2'])!!}
                            {!!Form::close()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-tenant-app>