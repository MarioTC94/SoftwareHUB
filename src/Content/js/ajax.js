$(document).ready(function () {

    //Ajax para Registrar Cliente
    $('#FormRegisterCliente').submit(function (e) {
        e.preventDefault();

        var errors = 0;
        $("#FormRegisterCliente :input").map(function () {
            if (!$(this).val()) {
                $(this).parent().addClass('has-danger');
                errors++;
            } else if ($(this).val()) {
                $(this).parent().removeClass('has-danger');
            }
        });
        if (errors > 0) {
            $('#ErrorCliente').html("");
            $('#ErrorCliente').append('<div class="alert alert-danger"><strong>Error! </strong>Campos vacíos</div>');
            return false;
        }

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

    //Ajax para registrar Proveedor
    $('#FormRegisterProveedor').submit(function (e) {
        e.preventDefault();

        var errors = 0;
        $("#FormRegisterProveedor :input").map(function () {
            if (!$(this).val()) {
                $(this).parent().addClass('has-danger');
                errors++;
            } else if ($(this).val()) {
                $(this).parent().removeClass('has-danger');
            }
        });
        if (errors > 0) {
            $('#ErrorProveedor').html("");
            $('#ErrorProveedor').append('<div class="alert alert-danger"><strong>Error! </strong>Campos vacíos</div>');
            return false;
        }

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

    // Ajax para  Login
    $('#FormLogin').submit(function (e) {
        e.preventDefault();

        var errors = 0;
        $("#FormLogin :input").map(function () {
            if (!$(this).val()) {
                $(this).parent().addClass('has-danger');
                errors++;
            } else if ($(this).val()) {
                $(this).parent().removeClass('has-danger');
            }
        });
        if (errors > 0) {
            $('#ErrorLogin').html("");
            $('#ErrorLogin').append('<div class="alert alert-danger"><strong>Error! </strong>Campos vacíos</div>');
            return false;
        }


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


    //Ajax para insertar Software (Proovedor);
    $('#CreateSoftwareForm').submit(function (e) {
        e.preventDefault();

        var errors = 0;
        $("#CreateSoftwareForm :input").map(function () {
            if (!$(this).val()) {
                $(this).parent().addClass('has-danger');
                errors++;
            } else if ($(this).val()) {
                $(this).parent().removeClass('has-danger');
            }
        });
        if (errors > 0) {
            $('#ErrorSoftware').html("");
            $('#ErrorSoftware').append('<div class="alert alert-danger"><strong>Error! </strong>Campos vacíos</div>');
            return false;
        }

        $('#btnGuardarSoftware').prop('disabled', true);
        var Data = JSON.stringify(getFormData($('#CreateSoftwareForm')));
        $.ajax({
            url: '/SoftwareHUB/Proveedor/AddSoftware/', //Metodo del controlador de Asphyo donde van a llegar los datos
            type: 'POST',
            data: {
                DatosSoftware: Data
            },
            dataType: 'json',
            success: function (Respuesta) {
                switch (Respuesta.Codigo) {
                    case 1:
                        $('#ErrorSoftware').html("");
                        $('#ErrorSoftware').append('<div class="alert alert-success" style="width: 100%, height: 100%"><strong>Exito! </strong>' + Respuesta.Mensaje + '</div>');
                        $('#CreateSoftware').delay(2000).fadeOut(1000);
                        setTimeout(function () {
                            $('#CreateSoftware').modal("hide");
                            $('#CreateSoftwareForm').trigger("reset");
                            $('#ErrorSoftware').html("");
                            $('#btnGuardarSoftware').prop('disabled', false);
                        }, 3000);
                        break;
                    default:
                        $('#ErrorSoftware').html("");
                        $('#ErrorSoftware').append('<div class="alert alert-danger"><strong>Error! </strong>' + Respuesta.Mensaje + '</div>');
                        $('#btnGuardarSoftware').prop('disabled', false);
                        break;
                }
            },
            error: function (e) {
                console.log(e);
            }
        });
    });







    //Ajax para insertar Incidente
    $('#CreateIncidentForm').submit(function (e) {
        e.preventDefault();

        var errors = 0;
        $("#CreateIncidentForm :input").map(function () {
            if (!$(this).val()) {
                $(this).parent().addClass('has-danger');
                errors++;
            } else if ($(this).val()) {
                $(this).parent().removeClass('has-danger');
            }
        });
        if (errors > 0) {
            $('#ErrorIncidente').html("");
            $('#ErrorIncidente').append('<div class="alert alert-danger"><strong>Error! </strong>Campos vacíos</div>');
            return false;
        }

        $('#btnInsertarIncidente').prop('disabled', true);
        var Data = JSON.stringify(getFormData($('#CreateIncidentForm')));
        $.ajax({
            url: '/SoftwareHUB/Cliente/AddIncident/', //Metodo del controlador de Asphyo donde van a llegar los datos
            type: 'POST',
            data: {
                DatosIncidente: Data
            },
            dataType: 'json',
            success: function (Respuesta) {
                switch (Respuesta.Codigo) {
                    case 1:
                        $('#ErrorIncidente').html("");
                        $('#ErrorIncidente').append('<div class="alert alert-success" style="width: 100%, height: 100%"><strong>Exito! </strong>' + Respuesta.Mensaje + '</div>');
                        $('#CreateIncident').delay(2000).fadeOut(1000);
                        setTimeout(function () {
                            $('#CreateIncident').modal("hide");
                            $('#CreateIncidentForm').trigger("reset");
                            $('#ErrorIncidente').html("");
                            $('#btnInsertarIncidente').prop('disabled', false);
                        }, 3000);
                        break;
                    default:
                        $('#ErrorIncidente').html("");
                        $('#ErrorIncidente').append('<div class="alert alert-danger"><strong>Error! </strong>' + Respuesta.Mensaje + '</div>');
                        $('#btnInsertarIncidente').prop('disabled', false);
                        break;
                }
            },
            error: function (e) {
                console.log(e);
            }
        });
    });


    $('#CBProveedor').on('change', function () {

        $('#CBSoftware').empty();
        $.ajax({
            url: '/SoftwareHUB/Cliente/getSoftwareByID/', //Metodo del controlador de Asphyo donde van a llegar los datos
            type: 'POST',
            data: {
                IDProveedor: $('#CBProveedor').val()
            },
            dataType: 'json',
            success: function (Respuesta) {
                switch (Respuesta.Codigo) {
                    case 1:
                        for (var i = 0; i < Respuesta.Data.length; i++) {
                            $('#CBSoftware').append('<option value="' + Respuesta.Data[i]['PK_IDSoftware'] + '">' + Respuesta.Data[i]['NombreSoftware'] + '</option>');
                        }
                        break;
                    default:
                        $('#ErrorIncidente').html("");
                        $('#ErrorIncidente').append('<div class="alert alert-danger"><strong>Error! </strong>Error al traer Software</div>');
                        break;
                }
            },
            error: function (e) {
                console.log(e);
            }
        });
    });



    //Helper para ordenar los datos
    function getFormData($form) {
        var unindexed_array = $form.serializeArray();
        var indexed_array = {};
        $.map(unindexed_array, function (n, i) {
            indexed_array[n['name']] = n['value'];
        });
        return indexed_array;
    }

});
