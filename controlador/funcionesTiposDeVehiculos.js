function actualizarTabla() {
    $.ajax({
        url: "../modelo/accionesTiposDeVehiculos.php?accion=ver",
        type: "GET",
        success: function(data) {
            $('tbody').html(data);
        }
    });
}

function agregarTipoDeVehiculo() {
   let consecutivo = $('#consecutivo').val();
   let nombre = $('#nombre').val();
   let descripcion = $('#descripcion').val();

   let cadena ="consecutivo=" + consecutivo +
               "&nombre=" + nombre+
               "&descripcion=" + descripcion;


   $.ajax({
       type: "POST",
       url: "../modelo/accionesTiposDeVehiculos.php?accion=registrar",
       data: cadena,
       success: function(r){
           console.log(r);
           if(r==1){
               alertify.success('Tipo de vehículo agregado correctamente');
               actualizarTabla(); // Actualizar la tabla
           } else {
               alertify.error('Error al agregar el Tipo de vehículo');
           }
       },
       error: function() {
           alertify.error('Error en la solicitud');
       }
   });
}

function actualizarTipoDeVehiculo(){
   let idTiposDeVehiculo = $('#idTiposDeVehiculo').val();
   let consecutivou = $('#consecutivou').val();
   let nombreu = $('#nombreu').val();
   let descripcionu = $('#descripcionu').val();

   let cadena = "idTiposDeVehiculo=" + idTiposDeVehiculo + 
               "&consecutivou=" + consecutivou +
               "&nombreu="   + nombreu +
               "&descripcionu="    + descripcionu;

   $.ajax({
       type: "POST",
       url: "../modelo/accionesTiposDeVehiculos.php?accion=actualizar",
       data: cadena,
       success: function(r){   
           console.log(r);
           if(r == 1) {
               alertify.success('Tipos de vehículos actualizado correctamente');
               $('#modalEdicionTipoDeVehiculo').modal('hide'); // Oculta el modal después de actualizar
               actualizarTabla(); // Actualizar la tabla
           } else {
               alertify.error('Error al actualizar el tipo de vehículo');
           }
       },
       error: function() {
           alertify.error('Error en la solicitud');
       }
   });
}


function eliminarTipoDeVehiculo(idTiposDeVehiculo) {
       let cadena = "idTiposDeVehiculo=" + idTiposDeVehiculo;

       $.ajax({
           type: "POST",
           url: "../modelo/accionesTiposDeVehiculos.php?accion=eliminar",
           data: cadena,
           success: function(r){
               console.log(r);
               
               if(r == 1) {
                   alertify.success("Tipo de vehículo eliminado correctamente");
                   actualizarTabla(); // Actualizar la tabla
               } else {
                   alertify.error("Error al eliminar el tipo de vehículo");
               }
           }
       });

}