function actualizarTabla() {
    $.ajax({
        url: "../modelo/accionesTiposDeEquipos.php?accion=ver",
        type: "GET",
        success: function(data) {
            $('tbody').html(data);
        }
    });
}

function agregarTipoDeEquipo() {
    let tipoDeEquipo = $('#tipoDeEquipo').val();
    let cadena = "tipoDeEquipo=" + tipoDeEquipo;

    $.ajax({
        type: "POST",
        url: "../modelo/accionesTiposDeEquipos.php?accion=registrar",
        data: cadena,
        success: function(r){
             console.log(r);
             if(r==0){
                alertify.error('Error al agregar el tipo de Equipo');
            } else {
                alertify.success('Tipo de equipo agregado correctamente');
                actualizarTabla(); // Actualizar la tabla
            }
        },
        error: function() {
            alertify.error('Error en la solicitud');
        }
    });
}

function actualizarTipoDeEquipo (){
    let idTipoDeEquipo = $('#idTipoDeEquipo').val();
    let tipoDeEquipou = $('#tipoDeEquipou').val();
    let cadena = "idTipoDeEquipo=" + idTipoDeEquipo + "&tipoDeEquipou=" + tipoDeEquipou;

    $.ajax({
        type: "POST",
        url: "../modelo/accionesTiposDeEquipos.php?accion=actualizar",
        data: cadena,
        success: function(r){   
            console.log(r);
            if(r == 1) {
                alertify.success('Tipo de equipo actualizado correctamente');
                $('#modalEdicionTiposDeEquipos').modal('hide'); // Oculta el modal después de actualizar
                actualizarTabla(); // Actualizar la tabla
            } else {
                alertify.error('Error al actualizar el tipo de equipo');
            }
        },
        error: function() {
            alertify.error('Error en la solicitud');
        }
    });
}


function eliminarTipoDeEquipo(idTipoDeEquipo) {
        let cadena = "idTipoDeEquipo=" + idTipoDeEquipo;

        $.ajax({
            type: "POST",
            url: "../modelo/accionesTiposDeEquipos.php?accion=eliminar",
            data: cadena,
            success: function(r){
                console.log(r);
                if(r == 1) {
                    alertify.success('Tipo de equipo eliminado correctamente');
                    actualizarTabla(); // Actualizar la tabla
                } else {
                    alertify.error('Error al eliminar el tipo de equipo');
                }
            }
        });
    }