/**
 * Created by mijae on 09/02/2017.
 */
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
function upperCase() {
    var x = document.getElementById("fname").value
    document.getElementById("fname").value = x.toUpperCase()

}