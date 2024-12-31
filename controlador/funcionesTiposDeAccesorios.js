function actualizarTabla() {
    $.ajax({
        url: "../modelo/accionesTiposDeAccesorios.php?accion=ver",
        type: "GET",
        success: function(data) {
            $('tbody').html(data);
        }
    });
}

function agregarTipoDeAccesorio() {
    let tipoDeAccesorio = $('#tipoDeAccesorio').val();
    let cadena = "tipoDeAccesorio=" + tipoDeAccesorio;

    $.ajax({
        type: "POST",
        url: "../modelo/accionesTiposDeAccesorios.php?accion=registrar",
        data: cadena,
        success: function(r){
             console.log(r);
             if(r==0){
                alertify.error('Error al agregar el tipo de Accesorio');
            } else {
                alertify.success('Tipo de accesorio agregado correctamente');
                actualizarTabla(); // Actualizar la tabla
            }
        },
        error: function() {
            alertify.error('Error en la solicitud');
        }
    });
}

function actualizarTipoDeAccesorio (){
    let idTipoDeAccesorio = $('#idTipoDeAccesorio').val();
    let nombreTipoDeAccesoriou = $('#nombreTipoDeAccesoriou').val();
    let cadena = "idTipoDeAccesorio=" + idTipoDeAccesorio + "&nombreTipoDeAccesoriou=" + nombreTipoDeAccesoriou;

    $.ajax({
        type: "POST",
        url: "../modelo/accionesTiposDeAccesorios.php?accion=actualizar",
        data: cadena,
        success: function(r){   
            console.log(r);
            if(r == 1) {
                alertify.success('Tipo de accesorio actualizado correctamente');
                $('#modalEdicionTiposDeAccesorios').modal('hide'); // Oculta el modal después de actualizar
                actualizarTabla(); // Actualizar la tabla
            } else {
                alertify.error('Error al actualizar el tipo de accesorio');
            }
        },
        error: function() {
            alertify.error('Error en la solicitud');
        }
    });
}


function eliminarTipoDeAccesorio(idTipoDeAccesorio) {
        let cadena = "idTipoDeAccesorio=" + idTipoDeAccesorio;

        $.ajax({
            type: "POST",
            url: "../modelo/accionesTiposDeAccesorios.php?accion=eliminar",
            data: cadena,
            success: function(r){
                console.log(r);
                if(r == 1) {
                    alertify.success('Tipo de accesorio eliminado correctamente');
                    actualizarTabla(); // Actualizar la tabla
                } else {
                    alertify.error('Error al eliminar el tipo de accesorio');
                }
            }
        });
    }