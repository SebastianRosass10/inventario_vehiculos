<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion;

if(isset($_GET['accion'])){
    $accion=$_GET['accion'];

    if($accion== 'registrar'){
        $tipoDeAccesorio= $_POST['tipoDeAccesorio'];
        $sql = "INSERT INTO accesorios_de_vehiculos (accesorios) VALUES (?)";
        
        $reg = $conexion->prepare($sql);
        $reg->bindParam(1, $tipoDeAccesorio);

        if($reg->execute()){
            echo 1;
        } else{
            echo 0;
        }

            // Acción para actualizar
        }elseif($accion == 'actualizar'){
            $idTipoDeAccesorio = $_POST['idTipoDeAccesorio'];
            $nombreTipoDeAccesoriou = $_POST['nombreTipoDeAccesoriou'];
               $sql = "UPDATE accesorios_de_vehiculos SET accesorios = ? WHERE id_accesorios = ?";
               $reg = $conexion->prepare($sql);
               $reg->bindParam(1, $nombreTipoDeAccesoriou);
               $reg->bindParam(2, $idTipoDeAccesorio);
   
             if($reg->execute()){
               echo 1;
                } else {
                  echo 0;
                 }
           
       
                   // Acción para eliminar
                }elseif($accion == 'eliminar'){
                $idTipoDeAccesorio = $_POST['idTipoDeAccesorio'];
   
               $sql = "DELETE FROM accesorios_de_vehiculos WHERE id_accesorios = ?";
               $reg = $conexion->prepare($sql);
               $reg->bindParam(1, $idTipoDeAccesorio);
   
                if($reg->execute()){
                 echo 1;
               } else {
                   echo 0;
               }
    }elseif($accion == 'ver'){
        $sql = "SELECT id_accesorios, accesorios FROM accesorios_de_vehiculos";
        $result = $conexion->prepare($sql);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($data as $index => $fila) {
            echo "<tr>
                <td>".($index + 1)."</td>
                <td>".$fila['accesorios']."</td>
                <td><button class='btn btn-primary btn-editar' data-id='".$fila['id_accesorios']."' data-nombre='".htmlspecialchars($fila['accesorios'])."'><i class='bi bi-pencil-square'></i></button></td>
                <td><button class='btn btn-danger btn-eliminar' data-id='".$fila['id_accesorios']."' data-nombre='".htmlspecialchars($fila['accesorios'])."'><i class='bi bi-trash'></i></button></td>
            </tr>";
        }
    }
}
?>