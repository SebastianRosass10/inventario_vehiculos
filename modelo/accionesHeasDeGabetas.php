<?php
date_default_timezone_set("America/Bogota");
require_once 'conexion.php';
$conexion = new Conexion;

if(isset($_GET['accion'])){
    $accion=$_GET['accion'];
    
        // Acción para registrar
    if($accion== 'registrar'){
        $numeroDeGabeta= $_POST['numeroDeGabeta'];
        $nombreDeHerramientas= $_POST['nombreDeHerramientas'];
        $nombreDeAccesorios = $_POST['nombreDeAccesorios'];
        $nombreDeEquipos = $_POST['nombreDeEquipos'];

        $sql = "INSERT INTO heas_de_gabetas (numero_de_gabeta, herramientas, accesorios, equipos) VALUES (?,?,?,?)";
        $reg = $conexion->prepare($sql);
        $reg->bindParam(1, $numeroDeGabeta);
        $reg->bindParam(2, $nombreDeHerramientas); 
        $reg->bindParam(3, $nombreDeAccesorios);
        $reg->bindParam(4, $nombreDeEquipos);

        if($reg->execute()){
            echo 1;
            }else{
                echo 0;
            }   

            // Acción para actualizar
    }elseif($accion == 'actualizar'){
        $idHeasDeGabetas = $_POST['idHeasDeGabetas'];
        $numeroDeGabetau = $_POST['numeroDeGabetau'];
        $nombreDeHerramientasu = $_POST['nombreDeHerramientasu'];
        $nombreDeAccesoriosu = $_POST['nombreDeAccesoriosu'];
        $nombreDeEquiposu = $_POST['nombreDeEquiposu'];

            $sql = "UPDATE heas_de_gabetas
            SET numero_de_gabeta = ?,
                herramientas = ?, 
                accesorios = ?,
                equipos = ?
            WHERE id_heas = ?";
            $reg = $conexion->prepare($sql);
            $reg->bindParam(1, $numeroDeGabetau);
            $reg->bindParam(2, $nombreDeHerramientasu);
            $reg->bindParam(3, $nombreDeAccesoriosu);
            $reg->bindParam(4, $nombreDeEquiposu);
            $reg->bindParam(5, $idHeasDeGabetas);

          if($reg->execute()){
            echo 1;
             } else {
               echo 0;
              }
        
    
                // Acción para eliminar
             }elseif($accion == 'eliminar'){
             $idHeasDeGabetas = $_POST['idHeasDeGabetas'];

            $sql = "DELETE FROM heas_de_gabetas WHERE id_heas = ?";
            $reg = $conexion->prepare($sql);
            $reg->bindParam(1, $idHeasDeGabetas);

             if($reg->execute()){
              echo 1;
            } else {
                echo 0;
            }
        } elseif($accion == 'ver'){
            $sql = "SELECT id_heas, numero_de_gabeta, herramientas, accesorios, equipos  FROM heas_de_gabetas";
            $result = $conexion->prepare($sql);
            $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($data as $index => $fila) {
                echo 
                "<tr>
                    <td>".($index + 1)."</td>
                    <td>".$fila['numero_de_gabeta']."</td>
                    <td>".$fila['herramientas']."</td>
                    <td>".$fila['accesorios']."</td>
                    <td>".$fila['equipos']."</td>
                    <td>
                        <button class='btn btn-primary btn-editar' 
                            data-id='".$fila['id_heas']."' 
                            data-numero-de-gabeta='".htmlspecialchars($fila['numero_de_gabeta'])."'
                            data-herramientas='".htmlspecialchars($fila['herramientas'])."'
                            data-accesorios='".htmlspecialchars($fila['accesorios'])."'
                            data-equipos='".htmlspecialchars($fila['equipos'])."'>
                            <i class='bi bi-pencil-square'></i>
                        </button>
                    </td>

                    <td>
                        <button class='btn btn-danger btn-eliminar' 
                            data-id='".$fila['id_heas']."' 
                            data-numero-de-gabeta='".htmlspecialchars($fila['numero_de_gabeta'])."'>
                            <i class='bi bi-trash'></i>
                        </button>
                    </td>
                </tr>";
            }
        }
}
?>