<?php
class HerramientasVehiculos
{ 
    // funcion para consultar todas las heas de las gabetas
    function verHerramientasVehiculos() 
    {
        require_once 'conexion.php';
        $conexion = new Conexion();
        $arreglo = array(); // arreglo vacio para almacenar los datos que va a enviar
      
        $consulta = "SELECT id_herramientas, herramientas FROM herramientas_de_vehiculos";  // Consulta para seleccionar los....

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


     public function contarTiposDeHerramientas() {
       $conexion = new Conexion();
       $consulta = "SELECT COUNT(id_herramientas) as cant FROM herramientas_de_vehiculos";
       $modules = $conexion->prepare($consulta);
       $modules->execute();
       $data = $modules->fetch(PDO::FETCH_ASSOC);
       return $data['cant'];
   }
}
?>