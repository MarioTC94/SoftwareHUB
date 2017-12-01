$(document).ready(function () {
    $(window).load(function () {
        $('.preload').animate({
            height: '0'
        }, 2000, function () {
            $('.preload').css('display', 'none');
        });
    });
    
    var marginDif = $('nav').height()
    $('.content').css({
        'margin-top': marginDif
    });
});