<?php
require_once '../modelo/datos_heasDeGabetas.php';
$heasDeGabetas = new HeasDeGabetas();
?>

<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset="UTF-8"> <!-- etiqueta de configuracion -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEA'S DE GABETAS</title>
    <?php include '../Librerias/librerias_css.php'; ?>
    
    <!-- Incluir Alertify desde un CDN -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

  </head>

  <body>
    <div class="container">
    <?php include_once './menu.php'; ?> 
      <h1 class="text-center"> HEA'S QUE HAY EN LAS GABETAS DE LOS VEHÍCULOS </h1>
      <div class="table text-center"> <!-- capa -->
        <table class="table table-striped table-hover table-bordered"> <!-- celdas oscuras y claras -->
          <thead>
            <tr>
              <th>ITEMS</th>
              <!-- <th>id inventario </th>  -->
              <th>Número de gabeta</th>
              <th>Herramientas </th>
              <th>Accesorios</th>
              <th>Equipos</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </tr>

          </thead>

          <tbody>
            <?php
            $cant = 1;  //sirve para el autoincremento del items
            $respHeasDeGabetas  = $heasDeGabetas->verHeasDeGabetas();   //respuesta que voy a traer de la materia
            foreach ($respHeasDeGabetas as $equipo) {   //por cada resgistro que encuentre me vaya formando una fila
            ?>
              <tr>
                <td><?php echo $cant; ?> </td>
                <!-- <td><?php echo $equipo['id_heas']; ?></td> -->
                <td><?php echo $equipo['numero_de_gabeta']; ?></td>
                <td><?php echo $equipo['herramientas']; ?></td>
                <td><?php echo $equipo['accesorios']; ?></td>
                <td><?php echo $equipo['equipos']; ?></td>

                    <td>
                        <!-- Botón para editar con modal -->
                      <button class="btn btn-primary btn-editar"
                          data-id="<?php echo $equipo['id_heas']; ?>"
                          data-numero-de-gabeta="<?php echo ($equipo['numero_de_gabeta']); ?>"
                          data-herramientas="<?php echo ($equipo['herramientas']); ?>"
                          data-accesorios="<?php echo ($equipo['accesorios']); ?>"
                          data-equipos="<?php echo ($equipo['equipos']); ?>" >
                          <i class="bi bi-pencil-square"></i>
                      </button>
                    </td>

                    <td>
                        <!-- Botón para eliminar  -->
                      <button class="btn btn-danger btn-eliminar"
                          data-id="<?php echo $equipo['id_heas']; ?>"
                          data-numero-de-gabeta="<?php echo htmlspecialchars($equipo['numero_de_gabeta']); ?>">
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
      <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalCrearHeasDeGabetas"><i class="bi bi-plus"></i> Agregar gabetas de vehículos</button>
    
    </div>
    <?php include './modales/modalHeasDeGabetas.php'; ?>  
    <?php include '../Librerias/librerias_JS.php'; ?>
    
    
  <!-- Incluir Alertify desde un CDN -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script src="../controlador/funcionesHeasDeGabetas.js" ></script>
    <script type="text/javascript">
      $(document).ready(function(){

         // Limpiar campos del formulario al abrir el modal de creación
      $('#modalCrearHeasDeGabetas').on('show.bs.modal', function (e) {
        $('#modalCrearHeasDeGabetas').find('input[type="text"]').val('');
      });


        // agregar inventario
        $('#agregarHeasDeGabetas').click(function(){
            agregarHeasDeGabetas();
        })

        // Editar inventario
        $(document).on('click', '.btn-editar', function() {
          let idHeasDeGabetas = $(this).data('id');
          let numeroDeGabeta = $(this).data('numero-de-gabeta');
          let nombreDeHerramientas = $(this).data('herramientas');
          let nombreDeAccesorios = $(this).data('accesorios');
          let nombreDeEquipos = $(this).data('equipos');

          $('#modalEdicionHeasDeGabetas #idHeasDeGabetas').val(idHeasDeGabetas);
          $('#modalEdicionHeasDeGabetas #numeroDeGabetau').val(numeroDeGabeta);
          $('#modalEdicionHeasDeGabetas #nombreDeHerramientasu').val(nombreDeHerramientas);
          $('#modalEdicionHeasDeGabetas #nombreDeAccesoriosu').val(nombreDeAccesorios);
          $('#modalEdicionHeasDeGabetas #nombreDeEquiposu').val(nombreDeEquipos);
          $('#modalEdicionHeasDeGabetas').modal('show');     // Muestra el modal de edición
        });

        // Actualizar inventario
        $('#editarHeasDeGabetas').click(function() {
            actualizarHeasDeGabetas();
        });

        // Eliminar inventario
        $(document).on('click', '.btn-eliminar', function() {
          let idHeasDeGabetas = $(this).data('id');
          let numeroDeGabeta = $(this).data('numero-de-gabeta');
          alertify.confirm("Confirmar eliminación", "¿Estás seguro de eliminar esta gabeta '" + numeroDeGabeta + "'?",
            function() {
                eliminarHeasDeGabetas(idHeasDeGabetas);
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