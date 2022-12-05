<x-tenant-app title="roles">
<div class="card">
    <div class="card-body">
            <form action="{{route('tenant.roles.store',tenant('id'))}}" method="post" novalidate >
                @csrf
                <label for="name">Ingrese el nombre del Rol</label>
                <input type="text" name="name" class="form-control"> <br>
                @error('name')                    
                <small class="text-danger">*{{$message}}</small>
                <br><br>                                            
                @enderror                                                
                

                <label for="permisos">Asignación de permisos</label><br>

                <div class="form-check">
                    <div class="form row">
                            @foreach ($permisos as $permiso)
                            <div class="form-group col-md-3">
                                
                                <input type="checkbox" value="{{$permiso->id}}" name="permisos[]"       
                                       class="form-check-input"> {{$permiso->name}} <br>
                            </div>
                            @endforeach
                        </div>
                </div> <br> 

                <button  class="btn btn-dark " type="submit">Crear Rol</button>
                
                <a class="btn btn-danger " href="{{route('tenant.roles',tenant('id'))}}">Volver</a>
            </form> 
            
    </div>
</div>
</x-tenant-app>