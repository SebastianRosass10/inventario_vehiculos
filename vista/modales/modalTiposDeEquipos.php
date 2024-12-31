<!-- Modal CREAR  -->
<div class="modal fade" id="modalCrearTiposDeEquipos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar un nuevo tipo de equipo </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="tipoDeEquipo">Nombre del tipo de equipo</label>
                        <input type="text" class="form-control" id="tipoDeEquipo" placeholder="Escriba el nombre del equipo" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="agregarTipoDeEquipo" data-bs-dismiss="modal">Crear</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal EDITAR -->
<div class="modal fade" id="modalEdicionTiposDeEquipos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar tipo de Equipo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="tipoDeEquipou">Nombre del tipo de equipo</label>
                        <input type="hidden" class="form-control" id="idTipoDeEquipo" required readonly>
                        <input type="text" class="form-control" id="tipoDeEquipou" placeholder="Escriba el nombre del tipo de equipos" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="editarTiposDeEquipos">Actualizar</button>
            </div>
        </div>
    </div>
</div>