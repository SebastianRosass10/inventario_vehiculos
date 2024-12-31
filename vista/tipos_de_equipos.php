<?php
require_once '../modelo/datos_tiposDeEquiposVehiculos.php';
$TipoDeEquipo = new EquiposVehiculos();
?>

<!DOCTYPE html>
<html lang="es">

    <head>
      <meta charset="UTF-8"> <!-- etiqueta de configuracion -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>TIPOS DE EQUIPOS</title>

        <?php
        include '../Librerias/librerias_css.php'; ?>
         <!-- Incluir Alertify desde un CDN -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    </head>

    <body>
      
        <div class="container">
          <?php include_once './menu.php'; ?>
          <h1 class="text-center"> LISTA DE TIPOS DE EQUIPOS </h1>
            <div class="table text-center"> <!-- capa -->
              <table class="table table-striped table-hover table-bordered"> <!-- celdas oscuras y claras -->
                <thead>
                  <tr>
                    <th>ITEMS</th>
                    <!-- <th>Id Servicios </th>  -->
                    <th>Equipos</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                  </tr>
                </thead>

              <tbody>
                <?php
                $cant = 1;  //sirve para el autoincremento del items
                $RespTipoDeEquipo  = $TipoDeEquipo->verEquiposVehiculos();   //respuesta que voy a traer de la materia
                //print_r($respCursos);
                foreach ($RespTipoDeEquipo as $fila) {   //por cada resgistro que encuentre me vaya formando una fila
                ?>
                  <tr>
                    <td><?php echo $cant; ?> </td>
                    <!-- <td><?php echo $fila['id_equipos']; ?></td> -->
                    <td><?php echo $fila['equipos']; ?></td>
                    
                    <td>
                            <!-- Botón para editar con modal -->
                          <button class="btn btn-primary btn-editar" data-id="<?php echo $fila['id_equipos']; ?>" data-nombre="<?php echo htmlspecialchars($fila['equipos']); ?>"><i class="bi bi-pencil-square"></i></button>
                    </td>
                    <td>
                            <!-- Botón para eliminar -->
                          <button class="btn btn-danger btn-eliminar" data-id="<?php echo $fila['id_equipos']; ?>" data-nombre="<?php echo htmlspecialchars($fila['equipos']); ?>"><i class="bi bi-trash"></i></button>
                    </td>
                  </tr>
                <?php
                  $cant++;    //autoincrementar la variable can
                }
                ?>
              </tbody>
            </table>
          </div>
                  <!-- Botón para abrir modal de creación -->
          <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalCrearTiposDeEquipos"><i class="bi bi-plus"></i> Registrar </button>
        </div>
      <?php
      include './modales/modalTiposDeEquipos.php';
      ?>
      <?php
      include '../Librerias/librerias_JS.php';
      ?>

  <!-- Incluir Alertify desde un CDN -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script src="../controlador/funcionesTiposDeEquipos.js" ></script>
  <script type="text/javascript">
    $(document).ready(function() {

      // Limpiar campos del formulario al abrir el modal de creación
      $('#modalCrearTiposDeEquipos').on('show.bs.modal', function (e) {
        $('#modalCrearTiposDeEquipos').find('input[type="text"]').val('');
      });

      // Agregar tipo de marca
      $('#agregarTipoDeEquipo').click(function() {
        agregarTipoDeEquipo ();
   });

      // Editar tipo de marca
      $(document).on('click', '.btn-editar', function(){
      let idTipoDeEquipo = $(this).data('id');
      let tipoDeEquipo = $(this).data('nombre');
      $('#modalEdicionTiposDeEquipos #idTipoDeEquipo').val(idTipoDeEquipo); 
      $('#modalEdicionTiposDeEquipos #tipoDeEquipou').val(tipoDeEquipo);
      $('#modalEdicionTiposDeEquipos').modal('show');
    });

      // Actualizar tipo de computadores
      $('#editarTiposDeEquipos').click(function() {
        actualizarTipoDeEquipo();
      });

        // Eliminar tipo de computadores
        $(document).on('click', '.btn-eliminar', function(){
        let idTipoDeEquipo = $(this).data('id');
        let tipoDeEquipo = $(this).data('nombre');
        alertify.confirm("Confirmar eliminación", "¿Estás seguro de eliminar el tipo de equipo '" + tipoDeEquipo + "'?",
          function() {
            eliminarTipoDeEquipo(idTipoDeEquipo);
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