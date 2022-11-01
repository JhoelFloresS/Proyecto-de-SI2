<x-tenant-app title="backups">
    <div class="card">
        <div class="card-header " style="">
            Crear Backup de la base de datos
        </div>
        <div class="card-body ">
            <div class="row ">
                <form action="{{route('tenant.backups.crear',tenant('id'))}}" method="post" novalidate >
                    @csrf
                                                            
                    <label >Elija las tablas que desee guardar</label><br> 
                    <h6 class="text-info ">si no selecciona ninguna tabla se creara un bakupcs con todas las tablas</h6>
                    <div class="form-check " name = "form-check">
                        @foreach ($tablas as $tabla)
                            <div class="form-row">
                                <input type="checkbox" value="{{$tabla}}" name="tablas[]"       
                                class="form-check-input"> {{$tabla}} <br>
                             </div> 
                        @endforeach    
                            <br>
                            
                            
                    </div> <br> 
    
                    <button  class="btn btn-dark " type="submit">Crear Backups</button>
                </form> 

            </div>
        </div>
    </div>

    <script></script>
</x-tenant-app>
