function actualizarTabla() {
    $.ajax({
        url: "../modelo/accionesInventarioVehiculos.php?accion=ver",
        type: "GET",
        success: function(data) {
            $('tbody').html(data);
        }
    });
}

function agregarInventarioDeVehiculos() {
    let tipoDeVehiculo = $('#tipoDeVehiculo').val();
    let cantidadDeGabetas = $('#cantidadDeGabetas').val();
    let codigo = $('#codigo').val();
    let placa = $('#placa').val();
    let marca = $('#marca').val();
    let funcion = $('#funcion').val();
    let modelo = $('#modelo').val();
    let motor = $('#motor').val();
    let transmision = $('#transmision').val();
    let combustible = $('#combustible').val();
    let claseDeVehiculo = $('#claseDeVehiculo').val();
    let numeroDeMotor = $('#numeroDeMotor').val();
    let numeroDeChasis = $('#numeroDeChasis').val();
    let adicional = $('#adicional').val();


    let cadena ="tipoDeVehiculo=" + tipoDeVehiculo +
                "&cantidadDeGabetas=" + cantidadDeGabetas+
                "&codigo=" + codigo + 
                "&placa=" + placa + 
                "&marca=" + marca + 
                "&funcion=" + funcion +
                "&modelo=" + modelo + 
                "&motor=" + motor + 
                "&transmision=" + transmision + 
                "&combustible=" + combustible +
                "&claseDeVehiculo=" + claseDeVehiculo + 
                "&numeroDeMotor=" + numeroDeMotor + 
                "&numeroDeChasis=" + numeroDeChasis + 
                "&adicional=" + adicional;


    $.ajax({
        type: "POST",
        url: "../modelo/accionesInventarioVehiculos.php?accion=registrar",
        data: cadena,
        success: function(r){
            console.log(r);
            if(r==1){
                alertify.success('inventario agregado correctamente');
                actualizarTabla(); // Actualizar la tabla
            } else {
                alertify.error('Error al agregar el inventario del vehículo');
            }
        },
        error: function() {
            alertify.error('Error en la solicitud');
        }
    });
}

function actualizarInventarioDeVehiculos (){
    let idInventarioVehiculos = $('#idInventarioVehiculos').val();
    let tipoDeVehiculou = $('#tipoDeVehiculou').val();
    let cantidadDeGabetasu = $('#cantidadDeGabetasu').val();
    let codigou = $('#codigou').val();
    let placau = $('#placau').val();
    let marcau = $('#marcau').val();
    let funcionu = $('#funcionu').val();
    let modelou = $('#modelou').val();
    let motoru = $('#motoru').val();
    let transmisionu = $('#transmisionu').val();
    let combustibleu = $('#combustibleu').val();
    let claseDeVehiculou = $('#claseDeVehiculou').val();
    let numeroDeMotoru = $('#numeroDeMotoru').val();
    let numeroDeChasisu= $('#numeroDeChasisu').val();
    let adicionalu = $('#adicionalu').val();

    let cadena = "idInventarioVehiculos=" + idInventarioVehiculos + 
                "&tipoDeVehiculou=" + tipoDeVehiculou +
                "&cantidadDeGabetasu=" + cantidadDeGabetasu +
                "&codigou=" + codigou +
                "&placau=" + placau + 
                "&marcau=" + marcau + 
                "&funcionu=" + funcionu + 
                "&modelou=" + modelou +
                "&motoru=" + motoru + 
                "&transmisionu=" + transmisionu + 
                "&combustibleu=" + combustibleu + 
                "&claseDeVehiculou=" + claseDeVehiculou +
                "&numeroDeMotoru=" + numeroDeMotoru + 
                "&numeroDeChasisu=" + numeroDeChasisu + 
                "&adicionalu=" + adicionalu;

    $.ajax({
        type: "POST",
        url: "../modelo/accionesInventarioVehiculos.php?accion=actualizar",
        data: cadena,
        success: function(r){   
            console.log(r);
            if(r == 1) {
                alertify.success('inventario actualizado correctamente');
                $('#modalEdicionInventarioVehiculos').modal('hide'); // Oculta el modal después de actualizar
                actualizarTabla(); // Actualizar la tabla
            } else {
                alertify.error('Error al actualizar el inventario');
            }
        },
        error: function() {
            alertify.error('Error en la solicitud');
        }
    });
}


function eliminarInventarioDeVehiculos(idInventarioVehiculos) {
        let cadena = "idInventarioVehiculos=" + idInventarioVehiculos;

        $.ajax({
            type: "POST",
            url: "../modelo/accionesInventarioVehiculos.php?accion=eliminar",
            data: cadena,
            success: function(r){
                console.log(r);
                if(r == 1) {
                    alertify.success("Inventario del equipo eliminado correctamente");
                    actualizarTabla(); // Actualizar la tabla
                } else {
                    alertify.error("Error al eliminar el inventario del vehículo");
                }
            }
        });

}

function verDetallesVehiculo(idVehiculo) {
    $.ajax({
        url: "../modelo/accionesInventarioVehiculos.php?accion=verDetalles&idVehiculo=" + idVehiculo,
        type: "GET",
        success: function(data) {
            $('#detallesTablaHija').html(data);
            $('#modalTipoDeVehiculo').modal('show');
        }
    });
}

// Añadir el evento para el botón de ver detalles
$(document).on('click', '#verDetallesVehiculo', function() {
    let idVehiculo = $(this).data('id');
    verDetallesVehiculo(idVehiculo);
});