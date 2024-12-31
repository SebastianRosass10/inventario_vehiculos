<!-- Modal CREAR  -->
<div class="modal fade" id="modalCrearTiposDeVehiculos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tipos de vehículos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="consecutivo">consecutivo</label>
                        <input type="int" class="form-control" id="consecutivo" placeholder="consecutivo" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">nombre del tipo de vehículo</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Escriba el tipo de vehículo" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">descripción</label>
                        <input type="text" class="form-control" id="descripcion" placeholder="descripcion">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="agregarTipoDeVehiculo" data-bs-dismiss="modal">Crear</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal EDITAR-->
<div class="modal fade" id="modalEdicionTipoDeVehiculo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar el tipo de vehículo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="consecutivou">consecutivo</label>
                        <input type="text" class="form-control" id="consecutivou" placeholder="consecutivo" required>
                    </div>
                    <div class="form-group">
                        <label for="nombreu">nombre del tipo de vehículo</label>
                        <input type="hidden" class="form-control" id="idTiposDeVehiculo" required readonly>
                        <input type="text" class="form-control" id="nombreu" placeholder="nombre del tipo de vehículo" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcionu">descripcion</label>
                        <input type="text" class="form-control" id="descripcionu" placeholder="descripcion">
                    </div>
                
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondart" data-bs-dismiss="modal"> cerrar</button>
                <button type="button" class="btn btn-primary" id="editarTiposDeVehiculos">Actualizar</button>
            </div>
        </div>
    </div>
</div>