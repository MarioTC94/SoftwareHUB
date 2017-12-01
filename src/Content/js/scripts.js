function __(id) {
    return document.getElementById(id);
}

function url(view, action) {
    var path = {
        'view': view,
        'action': action
    }
    $.ajax({
        url: "/",
        type: "GET",
        data: path
    });    
}