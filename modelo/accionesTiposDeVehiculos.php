<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion;

if(isset($_GET['accion'])){
    $accion=$_GET['accion'];
    
    if($accion== 'registrar'){
        $consecutivo= $_POST['consecutivo'];
        $nombre= $_POST['nombre'];
        $descripcion = $_POST['descripcion'];

        $sql = "INSERT INTO tipo_vehiculo (consecutivo, nombre, descripcion) VALUES (?,?,?)";
        $reg = $conexion->prepare($sql);
        $reg->bindParam(1, $consecutivo);
        $reg->bindParam(2, $nombre); 
        $reg->bindParam(3, $descripcion);

        if($reg->execute()){
            echo 1;
            }else{
                echo 0;
            }   

            // Acción para actualizar
    }elseif($accion == 'actualizar'){
        $idTiposDeVehiculo = $_POST['idTiposDeVehiculo'];
        $consecutivou = $_POST['consecutivou'];
        $nombreu = $_POST['nombreu'];
        $descripcionu = $_POST['descripcionu'];

            $sql = "UPDATE tipo_vehiculo
            SET consecutivo = ?,
                nombre = ?, 
                descripcion = ?
            WHERE id = ?";
            $reg = $conexion->prepare($sql);
            $reg->bindParam(1, $consecutivou);
            $reg->bindParam(2, $nombreu);
            $reg->bindParam(3, $descripcionu);
            $reg->bindParam(4, $idTiposDeVehiculo);

          if($reg->execute()){
            echo 1;
             } else {
               echo 0;
              }
        
    
                // Acción para eliminar
             }elseif($accion == 'eliminar'){
             $idTiposDeVehiculo = $_POST['idTiposDeVehiculo'];

            $sql = "DELETE FROM tipo_vehiculo WHERE id = ?";
            $reg = $conexion->prepare($sql);
            $reg->bindParam(1, $idTiposDeVehiculo);

             if($reg->execute()){
              echo 1;
            } else {
                echo 0;
            }
        } elseif($accion == 'ver'){
            $sql = "SELECT id, consecutivo, nombre, descripcion  FROM tipo_vehiculo";
            $result = $conexion->prepare($sql);
            $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($data as $index => $fila) {
                echo 
                "<tr>
                    <td>".($index + 1)."</td>
                    <td>".$fila['consecutivo']."</td>
                    <td>".$fila['nombre']."</td>
                    <td>".$fila['descripcion']."</td>
                    <td>
                        <button class='btn btn-primary btn-editar' 
                            data-id='".$fila['id']."' 
                            data-consecutivo='".htmlspecialchars($fila['consecutivo'])."'
                            data-nombre='".htmlspecialchars($fila['nombre'])."'
                            data-descripcion='".htmlspecialchars($fila['descripcion'])."'>
                            <i class='bi bi-pencil-square'></i>
                        </button>
                    </td>

                    <td>
                        <button class='btn btn-danger btn-eliminar' 
                            data-id='".$fila['id']."' 
                            data-nombre='".htmlspecialchars($fila['nombre'])."'>
                            <i class='bi bi-trash'></i>
                        </button>
                    </td>
                </tr>";
            }
        }
}
?>