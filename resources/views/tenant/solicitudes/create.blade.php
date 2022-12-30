
<x-tenant-app title="solicitudcreate">
    
    <div class="card ">
        <div class="card-body ">
            
            <form class="row g-3" method="POST" action=" {{route( 'tenant.solicitudes.store', tenant('id') )}} ">
                @csrf
                  <div class="col-md-6">
                    <label for="cliente_id" class="form-label">Cliente</label>
                    <select id="cliente_id" class="form-select" name="cliente_id" required>
                      <option value="" selected>...</option>
                      @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}"> {{ $cliente->user->name }} </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="inputState" class="form-label">Credito</label>
                    <select id="credito_id" class="form-select" name="credito_id" required>
                      <option value="" selected>...</option>
                      @foreach($creditos as $credito)
                        <option value="{{ $credito->id }}"> {{ $credito->nombre }} </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-12">
                    <label for="monto" class="form-label">Monto</label>
                    <input type="text" class="form-control" id="monto" name="monto" required>
                  </div>

                  <div class="col-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
              </form>

        </div>
    </div>
    
    <script></script>
</x-tenant-app>
