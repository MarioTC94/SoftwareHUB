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

                        var panel = `<div class="panel panel-primary panel-collapsable panel-chart">
                        <div class="panel-heading">
                            <div class="btn-group text-right">
                                <button class="btn btn-primary toggle-dropdown" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true"><span class="glyphicon glyphicon-cog"></span></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="`+ Respuesta.Data['URLDetalle'] + `">Detalle Incidente</a></li>
                                </ul>
                            </div>
                            <h4 class="collapsed" data-toggle="collapse" data-target="#sg`+ Respuesta.Data['PK_IDIncidente'] + `" aria-expanded="false"> ` + Respuesta.Data['NombreIncidente'] + `<div class="states"><span class="label  ` + Respuesta.Data['LabelTipoIncidente'] + `  "> ` + Respuesta.Data['DescripcionTipoIncidente'] + `</span><span class="label  ` + Respuesta.Data['LabelEstadoIncidente'] + `  ">` + Respuesta.Data['DescripcionEstadoIncidente'] + `</span></div></h4>
                            <div class="clearfix"></div>
                        </div>
                        <div id="sg`+ Respuesta.Data['PK_IDIncidente'] + `" class="panel-body collapse" aria-expanded="true"><p>` + Respuesta.Data['DescripcionIncidente'] + `</p></div>
                    </div>`
                        setTimeout(function () {
                            $(panel).hide().prependTo("#ContainerIncident").slideDown();
                        }, 3500);
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

    $('#FormChat').submit(function (e) {
        e.preventDefault();

        var errors = 0;
        $("#FormChat :input").map(function () {
            if (!$(this).val()) {
                $(this).parent().addClass('has-danger');
                errors++;
            } else if ($(this).val()) {
                $(this).parent().removeClass('has-danger');
            }
        });
        if (errors > 0) {
            $('#FormChat').append('<div id="mensajeErrorForm" style="display: none" class="alert alert-danger"><strong>Error! </strong>Campos vacíos</div>');
            $('#mensajeErrorForm').slideDown().delay(3000).slideUp(function () {
                return false;
            });

        }

        var Data = JSON.stringify(getFormData($('#FormChat')));
        $.ajax({
            url: '/SoftwareHUB/Chat/Comment', //Metodo del controlador de Asphyo donde van a llegar los datos
            type: 'POST',
            data: {
                DatosChat: Data
            },
            dataType: 'json',
            success: function (Respuesta) {
                switch (Respuesta.Codigo) {
                    case 1:
                        var htmlComment = `<li class="right clearfix">
                                            <span class="chat-img pull-right">
                                                <img class="img-circle" alt="User Avatar" src="http://placehold.it/50/FA6F57/fff">
                                            </span>
                                            <div class="chat-body clearfix">
                                                <div class="header">
                                                    <small class=" text-muted">
                                                        <i class="fa fa-clock-o fa-fw"></i> Hace un momento
                                                    </small>
                                                    <strong class="pull-right primary-font">`+ Respuesta.Nombre + `</strong>
                                                </div>
                                                <p>`+ Respuesta.Comentario + `</p>
                                            </div>
                                            </li>`;
                        $('#ContainerChat').append(htmlComment);
                        $('#btn-input').val("");
                        break;
                    default:
                        console.log(Respuesta);
                        $('#FormChat').html("");
                        $('#FormChat').append('<div class="alert alert-danger"><strong>Error! </strong>' + Respuesta.Mensaje + '</div>');
                        setTimeout(function () {
                            $('#FormChat').html("");
                        }, 3000);
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
