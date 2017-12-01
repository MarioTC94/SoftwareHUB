$(document).ready(function () {

    $('#FormRegister').submit(function (e) {
        e.preventDefault();
        var Data = $('#FormRegister').serialize();
        $.ajax({
            url: '/SoftwareHUB/Home/Index/', //Metodo del controlador de Asphyo donde van a llegar los datos
            type: 'POST',
            data: {
                DatosRegistro: Data
            },
            datatype: 'json',
            success: function (p) {
                if (p == 1) {
                    window.location.href = "/SoftwareHUB/Clientes/Index"
                } else {

                }
                console.log(p);
            },
            error: function (e) {
                console.log(e);
            }
        });
    });

    $('#btnSalir').click(function () {
        $('#RegisterModal').modal('hide');
    });
});

