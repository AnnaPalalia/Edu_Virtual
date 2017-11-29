$(function () {
    $('#register').submit(function () {
        $.ajax({
            type: 'POST',
            url: root + 'agregar',//localhost/mvc/
            data: $('#register').serialize(),
            success: function (response) {
                alert(response);
            }
        });
        return false;
    });

});