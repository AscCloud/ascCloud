$(document).ready(function () {
    $("#efectivo_add").click(function (e) {
        var valor = $("#valor_ejectivo").val();
        cadena='<tr>';
        cadena= cadena + '<td>'+valor+'<input type="hidden" id="valor_efectivo_table" value="'+valor+'"/></td>';
        cadena= cadena + '</tr>';
        $("#datatable-responsive-ejectivo tbody").append(cadena);
    });

});
