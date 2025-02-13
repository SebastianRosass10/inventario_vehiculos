<?php
// Simulación de datos (estos vendrán de tu base de datos)
$vehiculos = [
    ['codigo' => '2000', 'imagen' => '../public/images/vehiculos/2000.png'],
    ['codigo' => '2001', 'imagen' => '../public/images/vehiculos/2000.png'],
    ['codigo' => '2002', 'imagen' => '../public/images/vehiculos/2000.png'],
    ['codigo' => '2003', 'imagen' => '../public/images/vehiculos/2000.png'],
    ['codigo' => '2004', 'imagen' => '../public/images/vehiculos/2000.png'],
    ['codigo' => '2005', 'imagen' => '../public/images/vehiculos/2000.png'],
    ['codigo' => '2006', 'imagen' => '../public/images/vehiculos/2000.png'],
    ['codigo' => '2007', 'imagen' => '../public/images/vehiculos/2000.png'],
    ['codigo' => '2009', 'imagen' => '../public/images/vehiculos/2000.png'],
    ['codigo' => '2010', 'imagen' => '../public/images/vehiculos/2000.png'],
    ['codigo' => '2011', 'imagen' => '../public/images/vehiculos/2000.png'],
    ['codigo' => '2012', 'imagen' => '../public/images/vehiculos/2000.png'],
    ['codigo' => '2013', 'imagen' => '../public/images/vehiculos/2000.png'],
    ['codigo' => '2014', 'imagen' => '../public/images/vehiculos/2000.png'],
    ['codigo' => '2015', 'imagen' => '../public/images/vehiculos/2000.png'],
    ['codigo' => '2016', 'imagen' => '../public/images/vehiculos/2000.png'],
    ['codigo' => '2017', 'imagen' => '../public/images/vehiculos/2000.png']
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Vehículos</title>
    <link rel="stylesheet" href="../public/css/estilos_vista_usuario.css">
</head>
<body>
    <div class="contenedor">
        <h2>🚒 Inventario de Vehículos 🚒</h2>

        <!-- Escudo central (ahora más grande) -->
        <div class="escudo"></div>

        <!-- Nueva disposición en cuadrícula -->
        <div class="grid-galeria">
            <?php foreach ($vehiculos as $vehiculo): ?>
                <div class="tarjeta">
                    <a href="inventario_de_vehiculos.php?codigo=<?php echo $vehiculo['codigo']; ?>">
                        <img src="<?php echo $vehiculo['imagen']; ?>" alt="Vehículo <?php echo $vehiculo['codigo']; ?>">
                        <p><?php echo $vehiculo['codigo']; ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
