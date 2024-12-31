<!-- Modal CREAR  -->
<div class="modal fade" id="modalCrearTiposDeAccesorios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar un nuevo tipo de accesorio </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="tipoDeAccesorio">Nombre del tipo de accesorio</label>
                        <input type="text" class="form-control" id="tipoDeAccesorio" placeholder="Escriba el nombre del accesorio" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="agregarTipoDeAccesorio" data-bs-dismiss="modal">Crear</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal EDITAR  -->
<div class="modal fade" id="modalEdicionTiposDeAccesorios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar tipo de accesorio</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nombreTipoDeAccesoriou">Nombre del tipo de accesorio</label>
                        <input type="hidden" class="form-control" id="idTipoDeAccesorio" required readonly>
                        <input type="text" class="form-control" id="nombreTipoDeAccesoriou" placeholder="Escriba el nombre del tipo de accesorio" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="editarTipoDeAccesorio">Actualizar</button>
            </div>
        </div>
    </div>