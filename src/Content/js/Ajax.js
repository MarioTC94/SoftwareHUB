$(document).ready(function () {

    $('#FormRegisterCliente').submit(function (e) {
        e.preventDefault();
        var Data = JSON.stringify(getFormData($('#FormRegisterCliente')));
        $.ajax({
            url: '/SoftwareHUB/Home/RegistroCliente/', //Metodo del controlador de Asphyo donde van a llegar los datos
            type: 'POST',
            data: {
                DatosRegistro: Data
            },
            dataType: 'json',
            success: function (Respuesta) {
                switch (Respuesta.Codigo) {
                    case 1:
                        window.location.href = "/SoftwareHUB/" + Respuesta.Rol;
                        break;
                    default:
                        $('#ErrorCliente').html("");
                        $('#ErrorCliente').append('<div class="alert alert-danger"><strong>Error! </strong>' + Respuesta.Mensaje + '</div>');
                        break;
                }
            },
            error: function (e) {
                console.log(e);
            }
        });
    });

    $('#FormRegisterProveedor').submit(function (e) {
        e.preventDefault();
        var Data = JSON.stringify(getFormData($('#FormRegisterProveedor')));
        $.ajax({
            url: '/SoftwareHUB/Home/RegistroProveedor/', //Metodo del controlador de Asphyo donde van a llegar los datos
            type: 'POST',
            data: {
                DatosRegistro: Data
            },
            dataType: 'json',
            success: function (Respuesta) {
                switch (Respuesta.Codigo) {
                    case 1:
                        window.location.href = "/SoftwareHUB/" + Respuesta.Rol;
                        break;
                    default:
                        $('#ErrorProveedor').html("");
                        $('#ErrorProveedor').append('<div class="alert alert-danger"><strong>Error! </strong>' + Respuesta.Mensaje + '</div>');
                        break;
                }
            },
            error: function (e) {
                console.log(e);
            }
        });
    });
    // Ajax para Registro y Login

    $('#FormLogin').submit(function (e) {
        e.preventDefault();
        var Data = JSON.stringify(getFormData($('#FormLogin')));
        $.ajax({
            url: '/SoftwareHUB/Home/Login/', //Metodo del controlador de Asphyo donde van a llegar los datos
            type: 'POST',
            data: {
                DatosLogin: Data
            },
            dataType: 'json',
            success: function (Respuesta) {
                switch (Respuesta.Codigo) {
                    case 1:
                        window.location.href = "/SoftwareHUB/" + Respuesta.Rol;
                        break;
                    default:
                        $('#ErrorLogin').html("");
                        $('#ErrorLogin').append('<div class="alert alert-danger"><strong>Error! </strong>' + Respuesta.Mensaje + '</div>');
                        break;
                }
            },
            error: function (e) {
                console.log(e);
            }
        });

    });

    //Salir del Boton salir del modal Registro

    /*
     * 
     * 
     * Helper para ordenar los datos
     * 
     */


    function getFormData($form) {
        var unindexed_array = $form.serializeArray();
        var indexed_array = {};
        $.map(unindexed_array, function (n, i) {
            indexed_array[n['name']] = n['value'];
        });
        return indexed_array;
    }

});



