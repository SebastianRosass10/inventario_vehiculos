<?php
require_once '../modelo/datos_tiposDeVehiculos.php';
$tiposDeVehiculos = new TiposDeVehiculos();
?>

<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset="UTF-8"> <!-- etiqueta de configuracion -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIPOS DE VEHÍCULOS</title>
    <?php include '../Librerias/librerias_css.php'; ?>
    
    <!-- Incluir Alertify desde un CDN -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

  </head>

  <body>
    <div class="container">
      <?php include_once './menu.php'; ?>
      <h1 class="text-center"> LISTA DE LOS TIPOS DE VEHÍCULOS </h1>
      <div class="table text-center"> <!-- capa -->
        <table class="table table-striped table-hover table-bordered"> <!-- celdas oscuras y claras -->
          <thead>
            <tr>
              <th>ITEMS</th>
              <!-- <th>id inventario </th>  -->
              <th>Consecutivo</th>
              <th>Nombre </th>
              <th>Descripción</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </tr>

          </thead>

          <tbody>
            <?php
            $cant = 1;  //sirve para el autoincremento del items
            $respTiposDeVehiculos  = $tiposDeVehiculos->verTiposDeVehiculos();   //respuesta que voy a traer de la materia
            foreach ($respTiposDeVehiculos as $equipo) {   //por cada resgistro que encuentre me vaya formando una fila
            ?>
              <tr>
                <td><?php echo $cant; ?> </td>
                <!-- <td><?php echo $equipo['id']; ?></td> -->
                <td><?php echo $equipo['consecutivo']; ?></td>
                <td><?php echo $equipo['nombre']; ?></td>
                <td><?php echo $equipo['descripcion']; ?></td>

                    <td>
                        <!-- Botón para editar con modal -->
                      <button class="btn btn-primary btn-editar"
                          data-id="<?php echo $equipo['id']; ?>"
                          data-consecutivo="<?php echo ($equipo['consecutivo']); ?>"
                          data-nombre="<?php echo ($equipo['nombre']); ?>"
                          data-descripcion="<?php echo ($equipo['descripcion']); ?>" >
                          <i class="bi bi-pencil-square"></i>
                      </button>
                    </td>

                    <td>
                        <!-- Botón para eliminar  -->
                      <button class="btn btn-danger btn-eliminar"
                          data-id="<?php echo $equipo['id']; ?>"
                          data-nombre="<?php echo htmlspecialchars($equipo['nombre']); ?>">
                          <i class="bi bi-trash"></i>
                      </button>
                    </td> 
              </tr>
            <?php  
              $cant++;    //autoincrementar la variable can
            }
            ?>
          </tbody>
        </table>
      </div>
      <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalCrearTiposDeVehiculos"><i class="bi bi-plus"></i> Agregar tipo de vehículo</button>
    
    </div>
    <?php include './modales/modalTiposDeVehiculos.php'; ?>  
    <?php include '../Librerias/librerias_JS.php'; ?>
    
    
  <!-- Incluir Alertify desde un CDN -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script src="../controlador/funcionesTiposDeVehiculos.js" ></script>
    <script type="text/javascript">
      $(document).ready(function(){

        // Limpiar campos del formulario al abrir el modal de creación
      $('#modalCrearTiposDeVehiculos').on('show.bs.modal', function (e) {
        $('#modalCrearTiposDeVehiculos').find('input[type="text"]').val('');
      });

        // agregar inventario
        $('#agregarTipoDeVehiculo').click(function(){
            agregarTipoDeVehiculo();
        })

        // Editar inventario
        $(document).on('click', '.btn-editar', function() {
          let idTiposDeVehiculo = $(this).data('id');
          let consecutivo = $(this).data('consecutivo');
          let nombre = $(this).data('nombre');
          let descripcion = $(this).data('descripcion');

          $('#modalEdicionTipoDeVehiculo #idTiposDeVehiculo').val(idTiposDeVehiculo);
          $('#modalEdicionTipoDeVehiculo #consecutivou').val(consecutivo);
          $('#modalEdicionTipoDeVehiculo #nombreu').val(nombre);
          $('#modalEdicionTipoDeVehiculo #descripcionu').val(descripcion);
          $('#modalEdicionTipoDeVehiculo').modal('show');     // Muestra el modal de edición
        });

        // Actualizar inventario
        $('#editarTiposDeVehiculos').click(function() {
            actualizarTipoDeVehiculo();
        });

        // Eliminar inventario
        $(document).on('click', '.btn-eliminar', function() {
          let idTiposDeVehiculo = $(this).data('id');
          let nombre = $(this).data('nombre');
          alertify.confirm("Confirmar eliminación", "¿Estás seguro de eliminar tipo de vehículo '" + nombre + "'?",
            function() {
                eliminarTipoDeVehiculo(idTiposDeVehiculo);
              alertify.success('Registro eliminado');
            },
            function() {
              alertify.error('Eliminación cancelada');
            }
          );
        });
      });
    </script>
  </body>
</html>