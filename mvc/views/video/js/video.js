/**
 * Created by mijae on 07/06/2017.
 */
$(function () {
    $('#video').click(function () {
        // alert('hi');
        BootstrapDialog.show({
            title: 'Registro',
            message: $('<form method="post" id="videoN" name="videoN">' +
                '<div class="form-group">' +
                '<label for="recipient-name" class="control-label">Titulo:</label>' +
                '<input type="text" class="form-control" id="videoT" name="videoT">' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="message-text" class="control-label">Direccion:</label>' +
                '<textarea name="videoD" class="form-control"  cols="50" rows="5"></textarea>' +
                '</div>' +
                '</form>'),
            buttons: [{
                label: 'Agregar',
                action: function (dialog) {
                    $.ajax({
                        type: 'POST',
                        url: root + 'agregar',//localhost/mvc/
                        data: $('#videoN').serialize(),
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
    $('.videoR').click(function () {
       var url=$(this).data('url');
       BootstrapDialog.show({
           message: $('<div><iframe width="450" height="350" src="'+url+'"></iframe></div>'),
       });
    });

    $('.videoM').click(function () {
        var id = $(this).data('id');
        var nom = $(this).data('nombre');
        var url = $(this).data('url');

        BootstrapDialog.show({
            title: 'Registro',
            message: $('<form method="post" id="videoE" name="videoE">' +
                '<input type="hidden" id="idE" name="idE" value="' + id + '">' +
                '<div class="form-group">' +
                '<label for="recipient-name" class="control-label">Titulo:</label>' +
                '<input type="text" class="form-control" id="videoTE" name="videoTE" value="' + nom + '">' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="message-text" class="control-label">Direccion:</label>' +
                '<textarea name="videoDE" class="form-control"  cols="50" rows="5">' + url + '</textarea>' +
                '</div>' +
                '</form>'),
            buttons: [{
                label: 'Editar',
                action: function (dialog) {
                    $.ajax({
                        type: 'POST',
                        url: root + '/modificarV',//localhost/mvc/
                        data: $('#videoE').serialize(),
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
    $('.videoE').click(function () {
        var idE=$(this).data('id');
        var data = {id: idE};
        $.ajax({
            type: 'POST',
            url: root + '/elimina',
            data: data,
            success: function (response) {
                alert(response);
                location.reload();
            }
        });
    })
});