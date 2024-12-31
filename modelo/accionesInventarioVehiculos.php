<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion;

if(isset($_GET['accion'])){
    $accion=$_GET['accion'];
    if($accion== 'registrar'){
        $tipoDeVehiculo= $_POST['tipoDeVehiculo'];
        $cantidadDeGabetas= $_POST['cantidadDeGabetas'];
        $codigo = $_POST['codigo'];
        $placa = $_POST['placa'];
        $marca = $_POST['marca'];
        $funcion = $_POST['funcion'];
        $modelo = $_POST['modelo'];
        $motor= $_POST['motor'];
        $transmision = $_POST['transmision'];
        $combustible = $_POST['combustible'];
        $claseDeVehiculo = $_POST['claseDeVehiculo'];
        $numeroDeMotor = $_POST['numeroDeMotor'];
        $numeroDeChasis = $_POST['numeroDeChasis'];
        $adicional = $_POST['adicional'];

        $sql = "INSERT INTO inventario_de_vehiculos (tipo_de_vehiculo, cantidad_de_gabetas, codigo, placa, marca, funcion, modelo, motor, transmision, combustible, clase_de_vehiculo, numero_de_motor, numero_de_chasis, adicional) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $reg = $conexion->prepare($sql);
        $reg->bindParam(1, $tipoDeVehiculo);
        $reg->bindParam(2, $cantidadDeGabetas); 
        $reg->bindParam(3, $codigo);
        $reg->bindParam(4, $placa);
        $reg->bindParam(5, $marca);
        $reg->bindParam(6, $funcion);
        $reg->bindParam(7, $modelo);
        $reg->bindParam(8, $motor);
        $reg->bindParam(9, $transmision);
        $reg->bindParam(10, $combustible);
        $reg->bindParam(11, $claseDeVehiculo);
        $reg->bindParam(12, $numeroDeMotor);
        $reg->bindParam(13, $numeroDeChasis);
        $reg->bindParam(14, $adicional);

        if($reg->execute()){
            echo 1;
            }else{
                echo 0;
            }   

            // Acción para actualizar
    }elseif($accion == 'actualizar'){
        $idInventarioVehiculos = $_POST['idInventarioVehiculos'];
        $tipoDeVehiculou = $_POST['tipoDeVehiculou'];
        $cantidadDeGabetasu = $_POST['cantidadDeGabetasu'];
        $codigou = $_POST['codigou'];
        $placau = $_POST['placau'];
        $marcau = $_POST['marcau'];
        $funcionu = $_POST['funcionu'];
        $modelou = $_POST['modelou'];
        $motoru = $_POST['motoru'];
        $transmisionu= $_POST['transmisionu'];
        $combustibleu = $_POST['combustibleu'];
        $claseDeVehiculou = $_POST['claseDeVehiculou'];
        $numeroDeMotoru = $_POST['numeroDeMotoru'];
        $numeroDeChasisu  = $_POST['numeroDeChasisu'];
        $adicionalu = $_POST['adicionalu'];

            $sql = "UPDATE inventario_de_vehiculos
            SET tipo_de_vehiculo = ?,
                cantidad_de_gabetas = ?, 
                codigo = ?,
                placa = ?,
                marca = ?,
                funcion = ?,
                modelo = ?,
                motor = ?,
                transmision = ?,
                combustible = ?,
                clase_de_vehiculo = ?,
                numero_de_motor = ?,
                numero_de_chasis = ?,
                adicional = ?
            WHERE id_vehiculos = ?";
            $reg = $conexion->prepare($sql);
            $reg->bindParam(1, $tipoDeVehiculou);
            $reg->bindParam(2, $cantidadDeGabetasu);
            $reg->bindParam(3, $codigou);
            $reg->bindParam(4, $placau);
            $reg->bindParam(5, $marcau);
            $reg->bindParam(6, $funcionu);
            $reg->bindParam(7, $modelou);
            $reg->bindParam(8, $motoru);
            $reg->bindParam(9, $transmisionu);
            $reg->bindParam(10, $combustibleu);
            $reg->bindParam(11, $claseDeVehiculou);
            $reg->bindParam(12, $numeroDeMotoru);
            $reg->bindParam(13, $numeroDeChasisu);
            $reg->bindParam(14, $adicionalu);
            $reg->bindParam(15, $idInventarioVehiculos);

          if($reg->execute()){
            echo 1;
             } else {
               echo 0;
              }
        
    
                // Acción para eliminar
             }elseif($accion == 'eliminar'){
             $idInventarioVehiculos = $_POST['idInventarioVehiculos'];

            $sql = "DELETE FROM inventario_de_vehiculos WHERE id_vehiculos = ?";
            $reg = $conexion->prepare($sql);
            $reg->bindParam(1, $idInventarioVehiculos);

             if($reg->execute()){
              echo 1;
            } else {
                echo 0;
            }
        } elseif($accion == 'ver'){
            $sql = "SELECT id_vehiculos, tipo_de_vehiculo, cantidad_de_gabetas, codigo, placa, marca, funcion, modelo, motor, transmision, combustible, clase_de_vehiculo, numero_de_motor, numero_de_chasis, adicional FROM inventario_de_vehiculos";
            $result = $conexion->prepare($sql);
            $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($data as $index => $fila) {
                echo 
                "<tr>
                    <td>".($index + 1)."</td>
                    <td>".$fila['tipo_de_vehiculo']."</td>
                    <td>".$fila['cantidad_de_gabetas']."</td>
                    <td>".$fila['codigo']."</td>
                    <td>".$fila['placa']."</td>
                    <td>".$fila['marca']."</td>
                    <td>".$fila['funcion']."</td>
                    <td>".$fila['modelo']."</td>
                    <td>".$fila['motor']."</td>
                    <td>".$fila['transmision']."</td>
                    <td>".$fila['combustible']."</td>
                    <td>".$fila['clase_de_vehiculo']."</td>
                    <td>".$fila['numero_de_motor']."</td>
                    <td>".$fila['numero_de_chasis']."</td>
                    <td>".$fila['adicional']."</td>
                    <td>
                        <button class='btn btn-primary btn-editar' 
                            data-id='".$fila['id_vehiculos']."' 
                            data-tipo-de-vehiculo='".htmlspecialchars($fila['tipo_de_vehiculo'])."'
                            data-cantidad-de-gabetas='".htmlspecialchars($fila['cantidad_de_gabetas'])."'
                            data-codigo='".htmlspecialchars($fila['codigo'])."'
                            data-placa='".htmlspecialchars($fila['placa'])."'
                            data-marca='".htmlspecialchars($fila['marca'])."'
                            data-funcion='".htmlspecialchars($fila['funcion'])."'
                            data-modelo='".htmlspecialchars($fila['modelo'])."'
                            data-motor='".htmlspecialchars($fila['motor'])."'
                            data-transmision='".htmlspecialchars($fila['transmision'])."'
                            data-combustible='".htmlspecialchars($fila['combustible'])."'
                            data-clase-de-vehiculo='".htmlspecialchars($fila['clase_de_vehiculo'])."'
                            data-numero-de-motor='".htmlspecialchars($fila['numero_de_motor'])."'
                            data-numero-de-chasis='".htmlspecialchars($fila['numero_de_chasis'])."'
                            data-adicional='".htmlspecialchars($fila['adicional'])."' >
                            <i class='bi bi-pencil-square'></i>
                        </button>
                    </td>

                    <td>
                        <button class='btn btn-danger btn-eliminar' 
                            data-id='".$fila['id_vehiculos']."' 
                            data-tipo-de-vehiculo='".htmlspecialchars($fila['tipo_de_vehiculo'])."'>
                            <i class='bi bi-trash'></i>
                        </button>
                    </td>
                </tr>";
            }
        }
}
?>