function actualizarTabla() {
    $.ajax({
        url: "../modelo/accionesTiposDeHerramientas.php?accion=ver",
        type: "GET",
        success: function(data) {
            $('tbody').html(data);
        }
    });
}

function agregarTipoDeHerramienta() {
    let tipoDeHerramienta = $('#tipoDeHerramienta').val();
    let cadena = "tipoDeHerramienta=" + tipoDeHerramienta;

    $.ajax({
        type: "POST",
        url: "../modelo/accionesTiposDeHerramientas.php?accion=registrar",
        data: cadena,
        success: function(r){
             console.log(r);
             if(r==0){
                alertify.error('Error al agregar el tipo de herramienta');
            } else {
                alertify.success('Tipo de herramienta agregado correctamente');
                actualizarTabla(); // Actualizar la tabla
            }
        },
        error: function() {
            alertify.error('Error en la solicitud');
        }
    });
}

function actualizarTipoHerramienta (){
    let idTipoDeHerramienta = $('#idTipoDeHerramienta').val();
    let tipoDeHerramientau = $('#tipoDeHerramientau').val();
    let cadena = "idTipoDeHerramienta=" + idTipoDeHerramienta + "&tipoDeHerramientau=" + tipoDeHerramientau;

    $.ajax({
        type: "POST",
        url: "../modelo/accionesTiposDeHerramientas.php?accion=actualizar",
        data: cadena,
        success: function(r){   
            console.log(r);
            if(r == 1) {
                alertify.success('Tipo de herramienta actualizado correctamente');
                $('#modalEdicionTiposDeHerramientas').modal('hide'); // Oculta el modal después de actualizar
                actualizarTabla(); // Actualizar la tabla
            } else {
                alertify.error('Error al actualizar el tipo de herramienta');
            }
        },
        error: function() {
            alertify.error('Error en la solicitud');
        }
    });
}


function eliminarTipoDeHerramienta(idTipoDeHerramienta) {
        let cadena = "idTipoDeHerramienta=" + idTipoDeHerramienta;

        $.ajax({
            type: "POST",
            url: "../modelo/accionesTiposDeHerramientas.php?accion=eliminar",
            data: cadena,
            success: function(r){
                console.log(r);
                if(r == 1) {
                    alertify.success('Tipo de herramienta eliminado correctamente');
                    actualizarTabla(); // Actualizar la tabla
                } else {
                    alertify.error('Error al eliminar el tipo de herramienta');
                }
            }
        });
    }
