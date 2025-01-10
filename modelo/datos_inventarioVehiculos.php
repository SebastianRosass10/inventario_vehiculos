<?php
class Inventario
{ 
  public function verInventarioPorCodigo($codigo) 
{
    require_once 'conexion.php';
    $conexion = new Conexion();
    $arreglo = array();

    $consulta = "SELECT id_vehiculos, tipo_de_vehiculo, cantidad_de_gabetas, codigo, placa, marca, funcion, modelo, motor, transmision, combustible, clase_de_vehiculo, numero_de_motor, numero_de_chasis, adicional 
                 FROM inventario_de_vehiculos 
                 WHERE codigo = :codigo"; 

    $modulos = $conexion->prepare($consulta);
    $modulos->bindParam(':codigo', $codigo, PDO::PARAM_STR);
    $modulos->execute();

    while ($data = $modulos->fetch(PDO::FETCH_ASSOC)) {
        $arreglo[] = $data;
    }

    return $arreglo;
}
    // funcion para consultar todas los cursos
    //  function verInventario() 
    //  {
    //      require_once 'conexion.php';
    //      $conexion = new Conexion();
    //      $arreglo = array(); // arreglo vacio para almacenar los datos que va a enviar
      
    //      $consulta = "SELECT id_vehiculos, tipo_de_vehiculo, cantidad_de_gabetas, codigo, placa, marca, funcion, modelo, motor, transmision, combustible, clase_de_vehiculo, numero_de_motor, numero_de_chasis, adicional FROM inventario_de_vehiculos";  // Consulta para seleccionar los....

    //      $modulos = $conexion -> prepare($consulta);//primero que prepare y luego la ejecute esa consulta
    //      $modulos -> execute(); //ejecutar la consulta

    //      $total = $modulos -> rowCount(); // cantidad de datos encontrados  (rowcount-conntar filas)
    //      if ($total > 0)
    //      {
    //        $a = 0;
    //        while($data = $modulos ->fetch(PDO::FETCH_ASSOC))  #fetch
    //        {
    //          $arreglo[$a] = $data; //almacena cada fila en el areglo
    //          $a++;
    //        }
    //      }
    //      return $arreglo; //devolver el areglo con los tipos de puestos
    //  }


    public function contarInventarioVehiculos() {
      $conexion = new Conexion();
      $consulta = "SELECT COUNT(id_vehiculos) as cant FROM inventario_de_vehiculos";
      $modules = $conexion->prepare($consulta);
      $modules->execute();
      $data = $modules->fetch(PDO::FETCH_ASSOC);
      return $data['cant'];
  }




// función para obtener detalles de la tabla hija
    public function obtenerDetallesVehiculo($idVehiculo)
        {
            require_once 'conexion.php';
            $conexion = new Conexion();
            $arreglo = array();

            $consulta = "SELECT id, parte, consecutivo, nombre, descripcion FROM tipo_vehiculo WHERE id = :idVehiculo";
            $modulos = $conexion->prepare($consulta);
            $modulos->bindParam(':idVehiculo', $idVehiculo, PDO::PARAM_INT);
            $modulos->execute();

            while($data = $modulos->fetch(PDO::FETCH_ASSOC))
            {
                $arreglo[] = $data;
            }

            return $arreglo;
        }
      
}
      
?>