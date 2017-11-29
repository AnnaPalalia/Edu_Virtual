/**
 * Created by Alva on 24/01/2017.
 */
$(function () {
    $('#register').submit(function () {
        $.ajax({
            type:'POST',
            url: 'Registrar.php',
            data: $('#register').serialize(),
            success: function (response) {
                alert(response);
            }
        });
        return false;//para cuando le de enviar no haga nada
    })
});
