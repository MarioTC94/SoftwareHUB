$(document).ready(function () {

    $('#FormRegister').submit(function (e) {
        e.preventDefault();

        var data = $('#FormRegister').serializeArray();
        $.ajax({
            url: '/SoftwareHUB/Home/Index/', //Metodo del controlador de Asphyo donde van a llegar los datos
            type: 'POST',
            data: {
                DatosRegistro: data
            },
            datatype: 'json',
            success: function (p) {
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

