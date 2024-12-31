<!-- Modal CREAR  -->
<div class="modal fade" id="modalCrearHeasDeGabetas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Gabetas de vehículos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="numeroDeGabeta">Número de la gabeta</label>
                        <input type="text" class="form-control" id="numeroDeGabeta" placeholder="Escriba el número de la gabeta" required>
                    </div>
                    <div class="form-group">
                        <label for="nombreDeHerramientas">nombre De las herramientas que hay</label>
                        <input type="text" class="form-control" id="nombreDeHerramientas" placeholder="Escriba las herramientas" required>
                    </div>
                    <div class="form-group">
                        <label for="nombreDeAccesorios">accesorios que hay</label>
                        <input type="text" class="form-control" id="nombreDeAccesorios" placeholder="Escriba los accesorios">
                    </div>
                    <div class="form-group">
                        <label for="nombreDeEquipos">Equipos que hay</label>
                        <input type="text" class="form-control" id="nombreDeEquipos" placeholder="Escriba los equipos">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="agregarHeasDeGabetas" data-bs-dismiss="modal">Crear</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal EDITAR -->
<div class="modal fade" id="modalEdicionHeasDeGabetas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar el tipo de vehículo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="numeroDeGabetau">Cantidad de gabetas</label>
                        <input type="hidden" class="form-control" id="idHeasDeGabetas" required readonly>
                        <input type="text" class="form-control" id="numeroDeGabetau" placeholder="Cantidad de gabetas" required>
                    </div>
                    <div class="form-group">
                        <label for="nombreDeHerramientasu">nombre de herramientas</label>
                        <input type="text" class="form-control" id="nombreDeHerramientasu" placeholder="nombre de herramientas" required>
                    </div>
                    <div class="form-group">
                        <label for="nombreDeAccesoriosu">Nombre de accesorios</label>
                        <input type="text" class="form-control" id="nombreDeAccesoriosu" placeholder="nombre de accesorios">
                    </div>
                    <div class="form-group">
                        <label for="nombreDeEquiposu">Nombre de equipos</label>
                        <input type="text" class="form-control" id="nombreDeEquiposu" placeholder="nombre de equipos">
                    </div>
                
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondart" data-bs-dismiss="modal"> cerrar</button>
                <button type="button" class="btn btn-primary" id="editarHeasDeGabetas">Actualizar</button>
            </div>
        </div>
    </div>
</div>