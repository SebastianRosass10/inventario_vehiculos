<?php
// Conectar a la base de datos
require_once '../modelo/conexion.php';
$conn = new Conexion();

// Recuperar el ID del vehículo desde la URL
$id_vehiculo = $_GET['id_vehiculo'] ?? 0;

// Consulta para obtener la información del vehículo y sus gabetas
$sql_vehiculo = "SELECT * FROM inventario_de_vehiculos WHERE id = :id_vehiculo";
$stmt = $conn->prepare($sql_vehiculo);
$stmt->bindParam(':id_vehiculo', $id_vehiculo, PDO::PARAM_INT);
$stmt->execute();
$vehiculo = $stmt->fetch();

$sql_gabetas = "SELECT * FROM gabetas WHERE id_vehiculo = :id_vehiculo";
$stmt_gabetas = $conn->prepare($sql_gabetas);
$stmt_gabetas->bindParam(':id_vehiculo', $id_vehiculo, PDO::PARAM_INT);
$stmt_gabetas->execute();
$gabetas = $stmt_gabetas->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vista de Gabetas</title>
  <link rel="stylesheet" href="../public/css/estilos_de_gabetas.css">
</head>
<body>
  <div class="contenedor">
    <!-- Mostrar imagen del vehículo -->
    <img src="../public/imagenes/<?php echo $vehiculo['imagen']; ?>" alt="Imagen del Vehículo" class="imagen-fondo">
    
    <!-- Mostrar las gabetas -->
    <?php foreach ($gabetas as $index => $gabeta): ?>
      <div class="gabeta" style="top: <?php echo rand(10, 80); ?>%; left: <?php echo rand(10, 80); ?>%;" 
           onclick="mostrarDetalle('<?php echo $gabeta['id']; ?>')">
        Gabeta <?php echo $gabeta['numero']; ?>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- Modal para mostrar información de la gabeta -->
  <div id="modal">
    <h3>Detalle de la Gabeta</h3>
    <div id="contenido-modal"></div>
    <button onclick="cerrarModal()">Cerrar</button>
  </div>

  <script>
    // Función para mostrar el detalle de una gabeta
    function mostrarDetalle(idGabeta) {
      document.getElementById('contenido-modal').innerHTML = 'Información de la Gabeta con ID: ' + idGabeta;
      document.getElementById('modal').style.display = 'block';
    }

    // Función para cerrar el modal
    function cerrarModal() {
      document.getElementById('modal').style.display = 'none';
    }
  </script>
</body>
</html>
