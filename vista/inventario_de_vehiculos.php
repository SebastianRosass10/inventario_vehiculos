<?php
  require_once '../modelo/datos_inventarioVehiculos.php';
  // $inventarioVehiculos = new Inventario();

  // Capturar el código del vehículo desde la URL
  $codigo = isset($_GET['codigo']) ? $_GET['codigo'] : null;

  $inventarioVehiculos = new Inventario();

  // Si hay un código, obtener solo los datos del vehículo correspondiente
  if ($codigo) {
      $respInventarioVehiculos = $inventarioVehiculos->verInventarioPorCodigo($codigo);
  } else {
      // Si no se pasa un código, mostrar todos los vehículos (opcional)
      $respInventarioVehiculos = $inventarioVehiculos->verInventario();
  }

?>

<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset="UTF-8"> <!-- etiqueta de configuracion -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVENTARIO DE VEHÍCULOS</title>
    <?php include '../Librerias/librerias_css.php'; ?>
    
    <!-- Incluir Alertify desde un CDN -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

  </head>

  <body>
    <div class="container">
     <!-- <?php include_once './menu.php'; ?>  -->
      <h1 class="text-center"> VEHÍCULO-2014 </h1>
      <div class="table text-center"> <!-- capa -->
        <table class="table table-striped table-hover table-bordered"> <!-- celdas oscuras y claras -->
          <thead>
            <tr>
              <th>ITEMS</th>
              <!-- <th>id inventario </th>  -->
              <th>Tipo de vehículo</th>
              <th>Cantidad de gabetas</th>
              <th>Codigo</th>
              <th>Placa</th>
              <th>Marca</th>
              <th>Función</th>
              <th>Modelo</th>
              <th>Motor</th>
              <th>Transmision</th>
              <th>Combustible</th>
              <th>Clase de Vehículo</th>
              <th>Número de motor</th>
              <th>Número de chasis</th>
              <th>Adicional</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </tr>

          </thead>

          <tbody>
            <?php
            $cant = 1;  //sirve para el autoincremento del items
            // $respInventarioVehiculos = $inventarioVehiculos->verInventario();   //respuesta que voy a traer de la materia
            foreach ($respInventarioVehiculos as $equipo) {   //por cada resgistro que encuentre me vaya formando una fila
            ?>
              <tr>
                <td><?php echo $cant; ?> </td>
                <!-- <td><?php echo $equipo['id_vehiculos']; ?></td> -->
                <td><?php echo $equipo['tipo_de_vehiculo']; ?></td>
                <td><?php echo $equipo['cantidad_de_gabetas']; ?></td>
                <td><?php echo $equipo['codigo']; ?></td>
                <td><?php echo $equipo['placa']; ?></td>
                <td><?php echo $equipo['marca']; ?></td>
                <td><?php echo $equipo['funcion']; ?></td>
                <td><?php echo $equipo['modelo']; ?></td>
                <td><?php echo $equipo['motor']; ?></td>
                <td><?php echo $equipo['transmision']; ?></td>
                <td><?php echo $equipo['combustible']; ?></td>
                <td><?php echo $equipo['clase_de_vehiculo']; ?></td>
                <td><?php echo $equipo['numero_de_motor']; ?></td>
                <td><?php echo $equipo['numero_de_chasis']; ?></td>
                <td><?php echo $equipo['adicional']; ?></td>

                    <td>
                        <!-- Botón para editar con modal -->
                      <button class="btn btn-primary btn-editar"
                          data-id="<?php echo $equipo['id_vehiculos']; ?>"
                          data-tipo-de-vehiculo="<?php echo $equipo['tipo_de_vehiculo']; ?>"
                          data-cantidad-de-gabetas="<?php echo ($equipo['cantidad_de_gabetas']); ?>"
                          data-codigo="<?php echo ($equipo['codigo']); ?>"
                          data-placa="<?php echo ($equipo['placa']); ?>"
                          data-marca="<?php echo ($equipo['marca']); ?>"
                          data-funcion="<?php echo ($equipo['funcion']); ?>"
                          data-modelo="<?php echo $equipo['modelo']; ?>"
                          data-motor="<?php echo $equipo['motor']; ?>"
                          data-transmision="<?php echo ($equipo['transmision']); ?>"
                          data-combustible="<?php echo ($equipo['combustible']); ?>"
                          data-clase-de-vehiculo="<?php echo ($equipo['clase_de_vehiculo']); ?>"
                          data-numero-de-motor="<?php echo ($equipo['numero_de_motor']); ?>"
                          data-numero-de-chasis="<?php echo ($equipo['numero_de_chasis']); ?>"
                          data-adicional="<?php echo ($equipo['adicional']); ?>">
                          <i class="bi bi-pencil-square"></i>
                      </button>
                    </td>

                    <td>
                        <!-- Botón para eliminar  -->
                      <button class="btn btn-danger btn-eliminar"
                          data-id="<?php echo $equipo['id_vehiculos']; ?>"
                          data-tipo-de-vehiculo="<?php echo htmlspecialchars($equipo['tipo_de_vehiculo']); ?>">
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
      <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalCrearInventarioVehiculos"><i class="bi bi-plus"></i> Agregar Vehículo</button>
    
    </div>
    <?php include './modales/modalInventarioVehiculos.php'; ?>  
    <?php include '../Librerias/librerias_JS.php'; ?>
    
    
  <!-- Incluir Alertify desde un CDN -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script src="../controlador/funcionesInventarioVehiculos.js" ></script>
    <script type="text/javascript">
      $(document).ready(function(){

        // Limpiar campos del formulario al abrir el modal de creación
      $('#modalCrearInventarioVehiculos').on('show.bs.modal', function (e) {
        $('#modalCrearInventarioVehiculos').find('input[type="text"]').val('');
      });

        // agregar inventario
        $('#agregarInventarioVehiculos').click(function(){
            agregarInventarioDeVehiculos();
        })

        // Editar inventario
        $(document).on('click', '.btn-editar', function() {
          let idInventarioVehiculos = $(this).data('id');
          let tipoDeVehiculo = $(this).data('tipo-de-vehiculo');
          let cantidadDeGabetas = $(this).data('cantidad-de-gabetas');
          let codigo = $(this).data('codigo');
          let placa = $(this).data('placa');
          let marca = $(this).data('marca');
          let funcion = $(this).data('funcion');
          let modelo = $(this).data('modelo');
          let motor = $(this).data('motor');
          let transmision = $(this).data('transmision');
          let combustible = $(this).data('combustible');
          let claseDeVehiculo = $(this).data('clase-de-vehiculo');
          let numeroDeMotor = $(this).data('numero-de-motor');
          let numeroDeChasis = $(this).data('numero-de-chasis');
          let adicional = $(this).data('adicional');

          $('#modalEdicionInventarioVehiculos #idInventarioVehiculos').val(idInventarioVehiculos);
          $('#modalEdicionInventarioVehiculos #tipoDeVehiculou').val(tipoDeVehiculo);
          $('#modalEdicionInventarioVehiculos #cantidadDeGabetasu').val(cantidadDeGabetas);
          $('#modalEdicionInventarioVehiculos #codigou').val(codigo);
          $('#modalEdicionInventarioVehiculos #placau').val(placa);
          $('#modalEdicionInventarioVehiculos #marcau').val(marca);
          $('#modalEdicionInventarioVehiculos #funcionu').val(funcion);
          $('#modalEdicionInventarioVehiculos #modelou').val(modelo);
          $('#modalEdicionInventarioVehiculos #motoru').val(motor);
          $('#modalEdicionInventarioVehiculos #transmisionu').val(transmision);
          $('#modalEdicionInventarioVehiculos #combustibleu').val(combustible);
          $('#modalEdicionInventarioVehiculos #claseDeVehiculou').val(claseDeVehiculo);
          $('#modalEdicionInventarioVehiculos #numeroDeMotoru').val(numeroDeMotor);
          $('#modalEdicionInventarioVehiculos #numeroDeChasisu').val(numeroDeChasis);
          $('#modalEdicionInventarioVehiculos #adicionalu').val(adicional);
          $('#modalEdicionInventarioVehiculos').modal('show');     // Muestra el modal de edición
        });

        // Actualizar inventario
        $('#editarInventarioVehiculos').click(function() {
            actualizarInventarioDeVehiculos();
        });

        // Eliminar inventario
        $(document).on('click', '.btn-eliminar', function() {
          let idInventarioVehiculos = $(this).data('id');
          let tipoDeVehiculo = $(this).data('tipo-de-vehiculo');
          alertify.confirm("Confirmar eliminación", "¿Estás seguro de eliminar el inventario del vehículo '" + tipoDeVehiculo + "'?",
            function() {
                eliminarInventarioDeVehiculos(idInventarioVehiculos);
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