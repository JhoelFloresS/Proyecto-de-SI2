
<x-tenant-app title="creditoedit">
    
    <div class="card ">
        <div class="card-header">
            Actualizar
        </div>
        <div class="card-body ">
            
            <form class="row g-3" method="POST" 
            action=" {{route( 'tenant.creditos.update', [tenant('id'), $credito] )}} ">
                @csrf
                @method('PUT')
                <div class="col-12">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" 
                  placeholder="Nombre" value="{{ old('nombre', $credito->nombre) }}" required>
                </div>
                <div class="col-12">
                  <label for="descripcion" class="form-label">Descripción</label>
                  <textarea name="descripcion" id="descripcion" cols="30" rows="5" 
                  class="form-control" required> {{ old('descripcion', $credito->descripcion) }}
                  </textarea>
                  
                </div>

                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>

        </div>
    </div>
    
    <script></script>
</x-tenant-app>
