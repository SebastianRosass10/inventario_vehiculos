<!-- Modal CREAR  -->
<div class="modal fade" id="modalCrearTiposDeHerramientas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar un nuevo tipo de herramienta </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="tipoDeHerramienta">Nombre del tipo de herramienta</label>
                        <input type="text" class="form-control" id="tipoDeHerramienta" placeholder="Escriba el nombre de herramienta" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="agregarTipoDeHerramienta" data-bs-dismiss="modal">Crear</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal EDITAR  -->
<div class="modal fade" id="modalEdicionTiposDeHerramientas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar tipo de Herramientas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="tipoDeHerramientau">Nombre del tipo de herramienta</label>
                        <input type="hidden" class="form-control" id="idTipoDeHerramienta" required readonly>
                        <input type="text" class="form-control" id="tipoDeHerramientau" placeholder="Escriba el nombre del tipo de herramienta" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="editarTipoDeHerramientas">Actualizar</button>
            </div>
        </div>
    </div>
</div>