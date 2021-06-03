<x-app-layout>
    <br>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('') }}
        </h2>
    </x-slot>
<br>
    <div class="d-grid gap-2 col-9 mx-auto">
        
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-xl">
                <!-- Button trigger modal -->

  <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Ingresar a los modulos.
  </button>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Selecciona el modulo a ingresar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card text-center">
                <div class="card-header">
                  Admin
                </div>
                <div class="card-body">
                  <h5 class="card-title">Modulo de administracion</h5>
                  <p class="card-text">Accede a las funcionalidades del usuario ADMIN.</p>
                  <a href="#" class="btn btn-primary">Seleccionar!</a>
                </div>
                <div class="card-footer text-muted">
                  
                </div>
                
              </div><br><div class="card text-center">
                <div class="card-header">
                  Central
                </div>
                <div class="card-body">
                  <h5 class="card-title">Modulo Central</h5>
                  <p class="card-text">Accede a las funcionalidades del usuario CENTRAL.</p>
                  <a href="#" class="btn btn-primary">Seleccionar!</a>
                </div>
                <div class="card-footer text-muted">
                  
                </div>
              </div><br><div class="card text-center">
                <div class="card-header">
                  Sede
                </div>
                <div class="card-body">
                  <h5 class="card-title">Modulo Sede</h5>
                  <p class="card-text">Accede a las funcionalidades del usuario SEDE.</p>
                  <a href="#" class="btn btn-primary">Seleccionar!</a>
                </div>
                <div class="card-footer text-muted">
                  
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>

        </div>
      </div>
    </div>
  </div>
            </div>
        </div>
    </div>
</x-app-layout>
