<?php
require_once '../modelo/conexion.php';



if (isset($_GET['codigo'])) {
    $codigo = htmlspecialchars($_GET['codigo']); // Sanitiza el código recibido
    $conexion = new Conexion();

    try {
        // Consulta para filtrar el inventario por código
        $query = $conexion->prepare("SELECT * FROM inventario WHERE codigo = :codigo");
        $query->bindParam(':codigo', $codigo, PDO::PARAM_STR);
        $query->execute();
        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);

        if (empty($resultados)) {
            echo "<h1>No se encontraron resultados para el vehículo con código $codigo.</h1>";
        } else {
            echo "<h1>Inventario del Vehículo - Código: $codigo</h1>";
            echo "<table border='1'>";
            echo "<tr><th>ITEMS</th><th>Tipo de Vehículo</th><th>Cantidad de Gabeta</th><th>Código</th><th>Placa</th><th>Marca</th><th>Función</th><th>Modelo</th><th>Motor</th><th>Transmisión</th><th>Combustible</th><th>Clase de Vehículo</th><th>Número de Motor</th><th>Número de Chasis</th><th>Adicional</th></tr>";
            foreach ($resultados as $fila) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($fila['items']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['tipo_vehiculo']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['cantidad_gabeta']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['codigo']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['placa']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['marca']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['funcion']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['modelo']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['motor']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['transmision']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['combustible']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['clase_vehiculo']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['numero_motor']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['numero_chasis']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['adicional']) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
} else {
    echo "<h1>No se proporcionó un código válido.</h1>";
}
?>