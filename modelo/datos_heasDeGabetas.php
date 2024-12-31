<?php
class HeasDeGabetas
{ 
    // funcion para consultar todas las heas de las gabetas
    function verHeasDeGabetas() 
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array(); // arreglo vacio para almacenar los datos que va a enviar
      
        $consulta = "SELECT id_heas, numero_de_gabeta, herramientas, accesorios, equipos FROM heas_de_gabetas";  // Consulta para seleccionar los....

        $modulos = $conexion -> prepare($consulta);//primero que prepare y luego la ejecute esa consulta
        $modulos -> execute(); //ejecutar la consulta

        $total = $modulos -> rowCount(); // cantidad de datos encontrados  (rowcount-conntar filas)
        if ($total > 0)
        {
          $a = 0;
          while($data = $modulos ->fetch(PDO::FETCH_ASSOC))  #fetch
          {
            $arreglo[$a] = $data; //almacena cada fila en el areglo
            $a++;
          }
        }
        return $arreglo; //devolver el areglo con los tipos de puestos
    }


    public function contarHeasDeGabetas() {
      $conexion = new Conexion();
      $consulta = "SELECT COUNT(id_heas) as cant FROM heas_de_gabetas";
      $modules = $conexion->prepare($consulta);
      $modules->execute();
      $data = $modules->fetch(PDO::FETCH_ASSOC);
      return $data['cant'];
  }
}
?>