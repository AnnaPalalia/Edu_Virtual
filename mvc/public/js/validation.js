/**
 * Created by Alva on 18/01/2017.
 */
$(function () {
    $('#validation').submit(function () {
        //Crear una entrada de elemento nuevo, este sera nuestro campo de contrase?a hash
        var pwd = document.createElement('input');
        //Agregar este elemento al formulario
        $('#validation').append(pwd);
        pwd.name = 'pwd';
        pwd.type = 'hidden';
        pwd.value = hex_sha512($('#password').val());
        $('#password').val('');
        $.ajax({
            type:'POST',
            url:'login.php',
            data:$('#validation').serialize(),
            success: function (response) {
                console.log(response);
                if (response=='false'){
                    $('#response').html('<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">X</span></button> Contrase?a o Correo incorrectos</div>');
                }else{
                    setTimeout(function () {
                        window.location.href='./dashboard.php';
                    },500);
                }

            }

        });
        return false;
    });

});

