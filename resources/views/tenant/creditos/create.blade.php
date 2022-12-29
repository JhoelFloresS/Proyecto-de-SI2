
<x-tenant-app title="creditocreate">
    
    <div class="card ">
        <div class="card-body ">
            
            <form class="row g-3" method="POST" action=" {{route( 'tenant.creditos.store', tenant('id') )}} ">
                @csrf
                <div class="col-12">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" 
                  placeholder="Nombre" value="{{ old('nombre') }}" required>
                </div>
                <div class="col-12">
                  <label for="descripcion" class="form-label">Descripción</label>
                  <textarea name="descripcion" id="descripcion" cols="30" rows="5" 
                  class="form-control" required> {{ old('descripcion') }} </textarea>
                  
                </div>

                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>

        </div>
    </div>
    
    <script></script>
</x-tenant-app>
