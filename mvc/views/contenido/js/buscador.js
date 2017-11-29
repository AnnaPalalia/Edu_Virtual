/**
 * Created by mijae on 24/02/2017.
 */
$(function () {
    $('#buscador').submit(function () {
        $.ajax({
            type: 'POST',
            url: root + '/buscar',//localhost/mvc/
            data: $('#buscador').serialize(),
            success: function (response) {
                //alert(response);
                var obj = JSON.parse(response);
                var re = [];
                var rowHTML = [];

                $.each(obj, function (key, value) {
                    rowHTML = "<table class='table table-bordered'>" + re + "</table>";
                    re += "<tr>" + "<td>" + value.titulo + "</td>" + "<td>" + value.contenido + "</td>" + "</tr>";
                });
                /*$.each(obj, function (key, value) {
                 re += "<p>" + value.titulo + " : " + value.contenido + "</p>";
                 });*/
                BootstrapDialog.show({
                    title: 'Resultados de modificar',
                    message: rowHTML
                    // message: value.titulo+" : "+value.contenido
                });
                //console.log(re);
            }
        });
        return false;
    });
    $('.post-preview').click(function () {
        var id = $(this).data('id');
        var tit = $(this).data('titulo');
        var cont = $(this).data('contenido');

        BootstrapDialog.show({
            title: tit,
            message: cont,
            buttons: [{
                label: 'Editar',
                action: function (dialog) {
                    BootstrapDialog.show({
                        title: 'Modificar ',
                        message: $('<form method="post" id="editPost" name="editPost">' +
                            '<input type="hidden" id="idP" name="idP" value="' + id + '">' +
                            '<div class="form-group">' +
                            '<label for="recipient-name" class="control-label">Titulo:</label>' +
                            '<input type="text" class="form-control" id="nameM" name="nameM" value="' + tit + '">' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<label for="message-text" class="control-label">Contenido:</label>' +
                            '<textarea name="contM" class="form-control"  cols="50" rows="5">' + cont + '</textarea>' +
                            '</div>' +
                            '</form>'),
                        buttons: [{
                            label: 'Guardar',
                            cssClass: 'btn-warning',
                            action: function (dialog) {
                                    $.ajax({
                                        type: 'POST',
                                        url: root + '/modificarC',
                                        data: $('#editPost').serialize(),
                                        success: function (response) {
                                            alert(response);
                                            location.reload();
                                        }
                                    });
                                dialog.close();
                            }
                        }]
                    });
                }
            }, {
                label: 'Eliminar',
                cssClass: 'btn-warning',
                action: function (dialog) {
                    var data = {id: id};
                    $.ajax({
                        type: 'POST',
                        url: root + '/elimina',
                        data: data,
                        success: function (response) {
                            alert(response);
                            location.reload();
                        }
                    });
                    dialog.close();
                }
            }]
        });
    });
});

function upperCase() {
    var x = document.getElementById("fname").value
    document.getElementById("fname").value = x.toUpperCase()
}
