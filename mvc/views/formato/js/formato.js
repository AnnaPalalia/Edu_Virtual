$(function () {
    $('#formato').click(function () {
        var FAg = new Date();
        BootstrapDialog.show({
            title: 'Registro',
            message: $('<form method="post" id="formatoN" name="formatoN">' +
                '<div class="form-group">' +
                '<h5 class="selectorO">'+
                '<label for="recipient-name">TIPO:</label><select>'+
                '<?php foreach ($this->boxT as $boxT): ?>'+
                '<?php endforeach; ?>'+
                '</select>'+
                '</h5>'+
                '<label for="recipient-name" class="control-label">No. INVENTARIO:</label>' +
                '<input type="text" class="form-control" id="NInventario" name="NInventario" maxlength="9">' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="message-text" class="control-label">DESCRIPCIÓN DEL BIEN:</label>' +
                '<textarea name="descri" class="form-control" rows="2"></textarea>' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="message-text" class="control-label">MARCA:</label>' +
                '<input type="text" class="form-control" id="marca" name="marca">' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="recipient-name" class="control-label">MODELO:</label>' +
                '<input type="text" class="form-control" id="modelo" name="modelo">' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="recipient-name" class="control-label">SERIE:</label>' +
                '<input type="text" class="form-control" id="serie" name="serie">' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="message-text" class="control-label">OBSERVACIONES:</label>' +
                '<textarea name="obs" class="form-control" rows="2"></textarea>' +
                '<input type="hidden" id="Fnu" name="Fnu" class="control-label" value="' + FAg.getDate() + "/" + (FAg.getMonth() + 1) + "/" + FAg.getFullYear() + "-" + FAg.getHours() + ":" + FAg.getMinutes() + '">' +
                //'<input value="'+reloj+'">'+
                '<input type="hidden" id="ag" name="ag" value="Nuevo">' +
                '</div>' +
                '</form>'),
            buttons: [{
                label: 'Agregar',
                action: function (dialog) {
                    $.ajax({
                        type: 'POST',
                        url: root + 'agregarF',
                        //url: root + 'agregarF',//localhost/mvc/
                        data: $('#formatoN').serialize(),
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
    $('.formatoM').click(function () {
        var id = $(this).data('id');
        var a = $(this).data('1');
        var b = $(this).data('2');
        var c = $(this).data('3');
        var d = $(this).data('4');
        var e = $(this).data('5');
        var f = $(this).data('6');

        var fe = new Date();

        BootstrapDialog.show({
            title: 'Modificar',
            message: $('<form method="post" id="formatoE" name="formatoE">' +
                '<input type="hidden" id="idE" name="idE" value="' + id + '">' +
                '<div class="form-group">' +
                '<label for="recipient-name" class="control-label">No. INVENTARIO:</label>' +
                '<input type="text" class="form-control" id="NInventarioE" name="NInventarioE" maxlength="9" value="' + a + '">' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="message-text" class="control-label">DESCRIPCIÓN DEL BIEN:</label>' +
                '<textarea name="descriE" class="form-control" rows="2">' + b + '</textarea>' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="message-text" class="control-label">MARCA:</label>' +
                '<input type="text" class="form-control" id="marcaE" name="marcaE" value="' + c + '">' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="recipient-name" class="control-label">MODELO:</label>' +
                '<input type="text" class="form-control" id="modeloE" name="modeloE" value="' + d + '">' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="recipient-name" class="control-label">SERIE:</label>' +
                '<input type="text" class="form-control" id="serieE" name="serieE" value="' + e + '">' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="message-text" class="control-label">OBSERVACIONES:</label>' +
                '<textarea name="obsE" class="form-control" rows="2">' + f + '</textarea>' +
                '<input type="hidden" id="fe" name="fe" class="control-label" value="' + fe.getDate() + "/" + (fe.getMonth() + 1) + "/" + fe.getFullYear() + "-" + fe.getHours() + ":" + fe.getMinutes() + '">' +
                '<input type="hidden" id="modi" name="modi" value="Modificacion">' +
                '</div>' +
                '</form>'),
            buttons: [{
                label: 'Editar',
                action: function (dialog) {
                    $.ajax({
                        type: 'POST',
                        url: root + '/modificarForm',//localhost/mvc/
                        data: $('#formatoE').serialize(),
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
    $('.formatoE').click(function () {
        var idElim = $(this).data('id');
        var a = $(this).data('1');
        var b = $(this).data('2');
        var c = $(this).data('3');
        var d = $(this).data('4');
        var e = $(this).data('5');
        var f = $(this).data('6');
        var g = $(this).data('7');
        var fe = new Date();
        var fe2 = fe.getDate() + "/" + (fe.getMonth() + 1) + "/" + fe.getFullYear() + "-" + fe.getHours() + ":" + fe.getMinutes();

        var data = {id: idElim, invt: a, bien: b, marca: c, modelo: d, serie: e, obs: f, accion: g, fe: fe2};
        $.ajax({
            type: 'POST',
            url: root + '/eliminaForm',
            data: data,
            success: function (response) {
                alert(response);
                location.reload();
            }
        });
    });

    $('#formatoEnvia').click(function () {
//---------------------------------------------------------
        $("input[type=checkbox]:checked").each(function () {
            //cada elemento seleccionado
            alert($(this).val());
        });
//---------------------------------------------------------
    });
});