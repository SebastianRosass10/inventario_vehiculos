<?php
require_once '../modelo/datos_tiposDeAccesoriosVehiculos.php';
$TipoDeAccesorios = new AccesoriosVehiculos();
?>

<!DOCTYPE html>
<html lang="es">

    <head>
      <meta charset="UTF-8"> <!-- etiqueta de configuracion -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>TIPOS DE ACCESORIOS</title>

        <?php
        include '../Librerias/librerias_css.php'; ?>
         <!-- Incluir Alertify desde un CDN -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    </head>

    <body>
      
        <div class="container">
          <?php include_once './menu.php'; ?>
          <h1 class="text-center"> LISTA DE TIPOS DE ACCESORIOS </h1>
            <div class="table text-center"> <!-- capa -->
              <table class="table table-striped table-hover table-bordered"> <!-- celdas oscuras y claras -->
                <thead>
                  <tr>
                    <th>ITEMS</th>
                    <!-- <th>Id Servicios </th>  -->
                    <th>Accesorios</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                  </tr>
                </thead>

              <tbody>
                <?php
                $cant = 1;  //sirve para el autoincremento del items
                $RespTipoDeAccesorios  = $TipoDeAccesorios->verAccesoriosVehiculos();   //respuesta que voy a traer de la materia
                //print_r($respCursos);
                foreach ($RespTipoDeAccesorios as $fila) {   //por cada resgistro que encuentre me vaya formando una fila
                ?>
                  <tr>
                    <td><?php echo $cant; ?> </td>
                    <!-- <td><?php echo $fila['id_accesorios']; ?></td> -->
                    <td><?php echo $fila['accesorios']; ?></td>
                    
                    <td>
                            <!-- Botón para editar con modal -->
                          <button class="btn btn-primary btn-editar" data-id="<?php echo $fila['id_accesorios']; ?>" data-accesorios="<?php echo htmlspecialchars($fila['accesorios']); ?>"><i class="bi bi-pencil-square"></i></button>
                    </td>
                    <td>
                            <!-- Botón para eliminar -->
                          <button class="btn btn-danger btn-eliminar" data-id="<?php echo $fila['id_accesorios']; ?>" data-accesorios="<?php echo htmlspecialchars($fila['accesorios']); ?>"><i class="bi bi-trash"></i></button>
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
          <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalCrearTiposDeAccesorios"><i class="bi bi-plus"></i> Registrar </button>
        </div>
      <?php
      include './modales/modalTiposDeAccesorios.php';
      ?>
      <?php
      include '../Librerias/librerias_JS.php';
      ?>

  <!-- Incluir Alertify desde un CDN -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script src="../controlador/funcionesTiposDeAccesorios.js" ></script>
  <script type="text/javascript">
    $(document).ready(function() {

      // Limpiar campos del formulario al abrir el modal de creación
      $('#modalCrearTiposDeAccesorios').on('show.bs.modal', function (e) {
        $('#modalCrearTiposDeAccesorios').find('input[type="text"]').val('');
      });

      // Agregar tipo de marca
      $('#agregarTipoDeAccesorio').click(function() {
        agregarTipoDeAccesorio();
   });

      // Editar tipo de marca
      $(document).on('click', '.btn-editar', function(){
      let idTipoDeAccesorio = $(this).data('id');
      let tipoDeAccesorio = $(this).data('nombre');
      $('#modalEdicionTiposDeAccesorios #idTipoDeAccesorio').val(idTipoDeAccesorio); 
      $('#modalEdicionTiposDeAccesorios #nombreTipoDeAccesoriou').val(tipoDeAccesorio);
      $('#modalEdicionTiposDeAccesorios').modal('show');
    });

      // Actualizar tipo de computadores
      $('#editarTipoDeAccesorio').click(function() {
        actualizarTipoDeAccesorio();
      });

        // Eliminar tipo de computadores
        $(document).on('click', '.btn-eliminar', function(){
        let idTipoDeAccesorio = $(this).data('id');
        let tipoDeAccesorio = $(this).data('nombre');
        alertify.confirm("Confirmar eliminación", "¿Estás seguro de eliminar el tipo de accesorio '" + tipoDeAccesorio + "'?",
          function() {
            eliminarTipoDeAccesorio(idTipoDeAccesorio);
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