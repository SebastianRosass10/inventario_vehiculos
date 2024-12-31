<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion;

if(isset($_GET['accion'])){
    $accion=$_GET['accion'];

    if($accion== 'registrar'){
        $tipoDeHerramienta= $_POST['tipoDeHerramienta'];
        $sql = "INSERT INTO herramientas_de_vehiculos (herramientas) VALUES (?)";
        
        $reg = $conexion->prepare($sql);
        $reg->bindParam(1, $tipoDeHerramienta);

        if($reg->execute()){
            echo 1;
        } else{
            echo 0;
        }

            // Acción para actualizar
        }elseif($accion == 'actualizar'){
            $idTipoDeHerramienta = $_POST['idTipoDeHerramienta'];
            $tipoDeHerramientau = $_POST['tipoDeHerramientau'];
               $sql = "UPDATE herramientas_de_vehiculos SET herramientas = ? WHERE id_herramientas = ?";
               $reg = $conexion->prepare($sql);
               $reg->bindParam(1, $tipoDeHerramientau);
               $reg->bindParam(2, $idTipoDeHerramienta);
   
             if($reg->execute()){
               echo 1;
                } else {
                  echo 0;
                 }
           
       
                   // Acción para eliminar
                }elseif($accion == 'eliminar'){
                $idTipoDeHerramienta = $_POST['idTipoDeHerramienta'];
   
               $sql = "DELETE FROM herramientas_de_vehiculos WHERE id_herramientas = ?";
               $reg = $conexion->prepare($sql);
               $reg->bindParam(1, $idTipoDeHerramienta);
   
                if($reg->execute()){
                 echo 1;
               } else {
                   echo 0;
               }
    }elseif($accion == 'ver'){
        $sql = "SELECT id_herramientas, herramientas FROM herramientas_de_vehiculos";
        $result = $conexion->prepare($sql);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($data as $index => $fila) {
            echo "<tr>
                <td>".($index + 1)."</td>
                <td>".$fila['herramientas']."</td>
                <td><button class='btn btn-primary btn-editar' data-id='".$fila['id_herramientas']."' data-nombre='".htmlspecialchars($fila['herramientas'])."'><i class='bi bi-pencil-square'></i></button></td>
                <td><button class='btn btn-danger btn-eliminar' data-id='".$fila['id_herramientas']."' data-nombre='".htmlspecialchars($fila['herramientas'])."'><i class='bi bi-trash'></i></button></td>
            </tr>";
        }
    }
}
?>