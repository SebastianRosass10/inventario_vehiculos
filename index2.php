<?php
session_start();

require_once 'modelo/conexion.php';
require_once 'modelo/datos_heasDeGabetas.php';
require_once 'modelo/datos_inventarioVehiculos.php';
require_once 'modelo/datos_tiposDeAccesoriosVehiculos.php';
require_once 'modelo/datos_tiposDeEquiposVehiculos.php';
require_once 'modelo/datos_tiposDeHerramientas.php';
require_once 'modelo/datos_tiposDeVehiculos.php';


    // Instancias
    $heasDeGabetas = new HeasDeGabetas ();
    $inventario = new Inventario();
    $tiposDeAccesoriosVehiculos = new AccesoriosVehiculos();
    $tiposDeEquiposVehiculos = new EquiposVehiculos();
    $tiposDeHerramientas = new HerramientasVehiculos();
    $tiposDeVehiculos = new TiposDeVehiculos();


    // Contadores
    $cant_heasDeGabetas = $heasDeGabetas->contarHeasDeGabetas();
    $cant_inventario = $inventario->contarInventarioVehiculos();
    $cant_AccesoriosVehiculos = $tiposDeAccesoriosVehiculos->contarTiposDeAccesoriosVehiculos();
    $cant_EquiposVehiculos = $tiposDeEquiposVehiculos->contarTiposDeEquiposVehiculos();
    $cant_Herramientas = $tiposDeHerramientas->contarTiposDeHerramientas();
    $cant_tiposDeVehiculos = $tiposDeVehiculos->contarTiposDeVehiculos();


// Variables de visualización
    // Usuario Regular
    $msjBienvenido = "¡Bienvenido Administrador!";
    $textoInformacion3 = "HEA'S de gabetas de cada vehículo:";
    $textoInformacion4 = "Parametros: ";
    $textoInformacion5 = "Tipos de vehículos de la institución:";
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Inventario de Vehículos</title>
        <?php include_once 'librerias/librerias_css.php'; ?> 
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="public/css/estilos.css" rel="stylesheet"> 
    </head>


    <body>
        <div class="container">
            <div class="page-head mt-4">
                <div class="page-title">
                    <h1> <?php echo $msjBienvenido ?>
                        <!-- <small>Panel Principal</small>  -->
                    </h1>
                </div>
            </div>
            
                <h3>Inventario que hay de los vehículos de la institución</h3>
                <div class="row">
                    <div class="col-sm-3">
                        <a href="vista/inventario_de_vehiculos.php" class="text-decoration-none">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $cant_inventario; ?></h5>
                                    <p class="card-text">Vehículos</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <h3> <?php echo $textoInformacion3 ?> </h3>
                <div class="row">
                    <div class="col-sm-3">
                        <a href="vista/heas_de_gabetas.php" class="text-decoration-none">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $cant_heasDeGabetas; ?></h5>
                                    <p class="card-text">HEA'S</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                


                <h3> <?php echo $textoInformacion4 ?> </h3>
                <div class="row">
                    <div class="col-sm-3">
                        <a href="vista/tipos_de_accesorios.php" class="text-decoration-none">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $cant_AccesoriosVehiculos; ?></h5>
                                    <p class="card-text">Tipos de Accesorios</p>
                                </div>
                            </div>
                        </a> 
                    </div>

                    <div class="col-sm-3">
                        <a href="vista/tipos_de_equipos.php" class="text-decoration-none">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $cant_EquiposVehiculos; ?></h5>
                                    <p class="card-text">Tipos de Equipos</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-3">
                        <a href="vista/tipos_de_herramientas.php" class="text-decoration-none">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $cant_Herramientas; ?></h5>
                                    <p class="card-text">Tipos de Herramientas</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <h3> <?php echo $textoInformacion5 ?> </h3>
                    <div class="row">
                        <div class="col-sm-3">
                            <a href="vista/tipos_de_vehiculos.php" class="text-decoration-none">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $cant_tiposDeVehiculos; ?></h5>
                                        <p class="card-text">Tipos de Vehículos</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            

        <?php include_once 'librerias/librerias_JS.php'; ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>

</html>
