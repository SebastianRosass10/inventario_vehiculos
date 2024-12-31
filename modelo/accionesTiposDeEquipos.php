<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion;

if(isset($_GET['accion'])){
    $accion=$_GET['accion'];

    if($accion== 'registrar'){
        $tipoDeEquipo= $_POST['tipoDeEquipo'];
        $sql = "INSERT INTO equipos_de_vehiculos (equipos) VALUES (?)";
        
        $reg = $conexion->prepare($sql);
        $reg->bindParam(1, $tipoDeEquipo);

        if($reg->execute()){
            echo 1;
        } else{
            echo 0;
        }

            // Acción para actualizar
        }elseif($accion == 'actualizar'){
            $idTipoDeEquipo = $_POST['idTipoDeEquipo'];
            $tipoDeEquipou = $_POST['tipoDeEquipou'];
               $sql = "UPDATE equipos_de_vehiculos SET equipos = ? WHERE id_equipos = ?";
               $reg = $conexion->prepare($sql);
               $reg->bindParam(1, $tipoDeEquipou);
               $reg->bindParam(2, $idTipoDeEquipo);
   
             if($reg->execute()){
               echo 1;
                } else {
                  echo 0;
                 }
           
       
                   // Acción para eliminar
                }elseif($accion == 'eliminar'){
                $idTipoDeEquipo = $_POST['idTipoDeEquipo'];
   
               $sql = "DELETE FROM equipos_de_vehiculos WHERE id_equipos = ?";
               $reg = $conexion->prepare($sql);
               $reg->bindParam(1, $idTipoDeEquipo);
   
                if($reg->execute()){
                 echo 1;
               } else {
                   echo 0;
               }
    }elseif($accion == 'ver'){
        $sql = "SELECT id_equipos, equipos FROM equipos_de_vehiculos";
        $result = $conexion->prepare($sql);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($data as $index => $fila) {
            echo "<tr>
                <td>".($index + 1)."</td>
                <td>".$fila['equipos']."</td>
                <td><button class='btn btn-primary btn-editar' data-id='".$fila['id_equipos']."' data-nombre='".htmlspecialchars($fila['equipos'])."'><i class='bi bi-pencil-square'></i></button></td>
                <td><button class='btn btn-danger btn-eliminar' data-id='".$fila['id_equipos']."' data-nombre='".htmlspecialchars($fila['equipos'])."'><i class='bi bi-trash'></i></button></td>
            </tr>";
        }
    }
}
?>