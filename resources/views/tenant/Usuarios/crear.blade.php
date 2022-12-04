<x-tenant-app>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    @if ($errors->any())                                                
                    <div class="alert alert-dark alert-dismissible fade show" role="alert">
                    <strong>¡Revise los campos!</strong>                        
                        @foreach ($errors->all() as $error)                                    
                            <span class="badge badge-danger">{{ $error }}</span>
                        @endforeach                        
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                     @endif
                    
                       {!! Form::open(array('route'=>['usuarios.store', tenant('id')], 'method'=>'POST')) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        {!! Form::text('name', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        {!! Form::text('email', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        {!! Form::password('password', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="confirm-password">confirmar password</label>
                                        {!! Form::password('confirm-password', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="celular">Celular</label>
                                        {!! Form::text('celular', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Rol</label>
                                        {!! Form::select('roles[]', $roles, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary"> Guardar</button>
                                </div>
                            </div>
                       {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-tenant-app>