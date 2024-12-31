function actualizarTabla() {
    $.ajax({
        url: "../modelo/accionesHeasDeGabetas.php?accion=ver",
        type: "GET",
        success: function(data) {
            $('tbody').html(data);
        }
    });
}

function agregarHeasDeGabetas() {
   let numeroDeGabeta = $('#numeroDeGabeta').val();
   let nombreDeHerramientas = $('#nombreDeHerramientas').val();
   let nombreDeAccesorios = $('#nombreDeAccesorios').val();
   let nombreDeEquipos = $('#nombreDeEquipos').val();

   let cadena ="numeroDeGabeta=" + numeroDeGabeta +
               "&nombreDeHerramientas=" + nombreDeHerramientas+
               "&nombreDeAccesorios=" + nombreDeAccesorios +
               "&nombreDeEquipos=" + nombreDeEquipos;


   $.ajax({
       type: "POST",
       url: "../modelo/accionesHeasDeGabetas.php?accion=registrar",
       data: cadena,
       success: function(r){
           console.log(r);
           if(r==1){
               alertify.success('Heas agregadas correctamente');
               actualizarTabla(); // Actualizar la tabla
           } else {
               alertify.error('Error al agregar las Heas');
           }
       },
       error: function() {
           alertify.error('Error en la solicitud');
       }
   });
}

function actualizarHeasDeGabetas(){
   let idHeasDeGabetas = $('#idHeasDeGabetas').val();
   let numeroDeGabetau = $('#numeroDeGabetau').val();
   let nombreDeHerramientasu = $('#nombreDeHerramientasu').val();
   let nombreDeAccesoriosu = $('#nombreDeAccesoriosu').val();
   let nombreDeEquiposu = $('#nombreDeEquiposu').val();

   let cadena = "idHeasDeGabetas=" + idHeasDeGabetas + 
               "&numeroDeGabetau=" + numeroDeGabetau +
               "&nombreDeHerramientasu=" + nombreDeHerramientasu +
               "&nombreDeAccesoriosu=" + nombreDeAccesoriosu +
               "&nombreDeEquiposu="  + nombreDeEquiposu;

   $.ajax({
       type: "POST",
       url: "../modelo/accionesHeasDeGabetas.php?accion=actualizar",
       data: cadena,
       success: function(r){   
           console.log(r);
           if(r == 1) {
               alertify.success('Heas actualizadas correctamente');
               $('#modalEdicionHeasDeGabetas').modal('hide'); // Oculta el modal después de actualizar
               actualizarTabla(); // Actualizar la tabla
           } else {
               alertify.error('Error al actualizar las Heas de gabetas');
           }
       },
       error: function() {
           alertify.error('Error en la solicitud');
       }
   });
}


function eliminarHeasDeGabetas(idHeasDeGabetas) {
       let cadena = "idHeasDeGabetas=" + idHeasDeGabetas;

       $.ajax({
           type: "POST",
           url: "../modelo/accionesHeasDeGabetas.php?accion=eliminar",
           data: cadena,
           success: function(r){
               console.log(r);
               
               if(r == 1) {
                   alertify.success("Heas eliminadas correctamente");
                   actualizarTabla(); // Actualizar la tabla
               } else {
                   alertify.error("Error al eliminar las heas");
               }
           }
       });

}