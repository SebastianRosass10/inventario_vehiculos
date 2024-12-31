<!-- Modal CREAR  -->
<div class="modal fade" id="modalCrearInventarioVehiculos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar un nuevo vehículo al Inventario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
            <form>
                    <div class="form-group">
                        <label for="tipoDeVehiculo">Tipos de vehículos</label>
                        <input type="text" class="form-control" id="tipoDeVehiculo" placeholder="Escriba el tipo de vehículo">
                    </div>
                    <div class="form-group">
                        <label for="cantidadDeGabetas">Cantidad de gabetas que tiene el vehículo</label>
                        <input type="text" class="form-control" id="cantidadDeGabetas" placeholder="Escriba cuantas gabetas tiene el vehículo" required>
                    </div>
                    <div class="form-group">
                        <label for="codigo">codigo</label>
                        <input type="text" class="form-control" id="codigo" placeholder="Escriba el codigo" required>
                    </div>
                    <div class="form-group">
                        <label for="placa">placa</label>
                        <input type="text" class="form-control" id="placa" placeholder="escriba la placa" required>
                    </div>
                    <div class="form-group">
                        <label for="marca">marca</label>
                        <input type="text" class="form-control" id="marca" placeholder="Esciba la marca">
                    </div>
                    <div class="form-group">
                        <label for="funcion">Función</label>
                        <input type="text" class="form-control" id="funcion" placeholder="escriba la funcion del vehículo">
                    </div>
                    <div class="form-group">
                        <label for="modelo">Modelo</label>
                        <input type="text" class="form-control" id="modelo" placeholder="Escriba el modelo">
                    </div>
                    <div class="form-group">
                        <label for="motor">Motor</label>
                        <input type="text" class="form-control" id="motor" placeholder="Motor">
                    </div>
                    <div class="form-group">
                        <label for="transmision">Transmisión</label>
                        <input type="text" class="form-control" id="transmision" placeholder="Transmisión">
                    </div>
                    <div class="form-group">
                        <label for="combustible">Tipo de combustible</label>
                        <input type="text" class="form-control" id="combustible" placeholder="Combustible">
                    </div>
                    <div class="form-group">
                        <label for="claseDeVehiculo">Clase de vehículo</label>
                        <input type="text" class="form-control" id="claseDeVehiculo" placeholder="Escriba la clase del vehículo">
                    </div>
                    <div class="form-group">
                        <label for="numeroDeMotor">Número de motor</label>
                        <input type="text" class="form-control" id="numeroDeMotor" placeholder="Escriba el número de motor">
                    </div>
                    <div class="form-group">
                        <label for="numeroDeChasis">Número de chasis</label>
                        <input type="text" class="form-control" id="numeroDeChasis" placeholder="chasis">
                    </div>
                    <div class="form-group">
                        <label for="adicional">Algo adicional</label>
                        <input type="text" class="form-control" id="adicional" placeholder="adicional">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="agregarInventarioVehiculos" data-bs-dismiss="modal">Crear</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal EDITAR -->
<div class="modal fade" id="modalEdicionInventarioVehiculos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar equipo del inventario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
            <form>
                    <div class="form-group">
                        <label for="tipoDeVehiculou">nombre del tipo de vehículo</label>
                        <input type="hidden" class="form-control" id="idInventarioVehiculos" required readonly>
                        <input type="text" class="form-control" id="tipoDeVehiculou" placeholder="nombre del tipo de vehículo" required>
                    </div>
                    <div class="form-group">
                        <label for="cantidadDeGabetasu">Número de gabetas</label>
                        <input type="text" class="form-control" id="cantidadDeGabetasu" placeholder="Escriba el número de gabetas" required>
                    </div>
                    <div class="form-group">
                        <label for="codigou">Codigo</label>
                        <input type="text" class="form-control" id="codigou" placeholder="Codigo">
                    </div>
                    <div class="form-group">
                        <label for="placau">Placa del vehículo</label>
                        <input type="text" class="form-control" id="placau" placeholder="Placa del vehículo" required>
                    </div>
                    <div class="form-group">
                        <label for="marcau">Marca del vehículo</label>
                        <input type="text" class="form-control" id="marcau" placeholder="Marca del vehículo" required>
                    </div>

                    <div class="form-group">
                        <label for="funcionu">Función del vehículo</label>
                        <input type="text" class="form-control" id="funcionu" placeholder="Función del vehículo">
                    </div>
                    <div class="form-group">
                        <label for="modelou">Modelo</label>
                        <input type="text" class="form-control" id="modelou" placeholder="Modelo">
                    </div>
                    <div class="form-group">
                        <label for="motoru">Motor</label>
                        <input type="text" class="form-control" id="motoru" placeholder="Motor">
                    </div>
                    <div class="form-group">
                        <label for="transmisionu">Transmisión</label>
                        <input type="text" class="form-control" id="transmisionu" placeholder="Transmisión">
                    </div>
                    <div class="form-group">
                        <label for="combustibleu">Tipo de combustible</label>
                        <input type="text" class="form-control" id="combustibleu" placeholder="Combustible">
                    </div>
                    <div class="form-group">
                        <label for="claseDeVehiculou">Clase de vehículo</label>
                        <input type="text" class="form-control" id="claseDeVehiculou" placeholder="Clase de vehículo">
                    </div>
                    <div class="form-group">
                        <label for="numeroDeMotoru">Número del motor</label>
                        <input type="text" class="form-control" id="numeroDeMotoru" placeholder="Número del motor">
                    </div>
                    <div class="form-group">
                        <label for="numeroDeChasisu">Número del chasis</label>
                        <input type="text" class="form-control" id="numeroDeChasisu" placeholder="Número del chasis">
                    </div>
                    <div class="form-group">
                        <label for="adicionalu">Adicional</label>
                        <input type="text" class="form-control" id="adicionalu" placeholder="Adicional">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="editarInventarioVehiculos"data-bs-dismiss="modal">Actualizar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para mostrar los detalles de la tabla hija -->
<div class="modal fade" id="modalTipoDeVehiculo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tipos de Vehículos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Consecutivo</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                        </tr>
                    </thead>
                    <tbody id="detallesTablaHija">
                        <!-- Aquí se cargarán los detalles de la tabla hija -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>