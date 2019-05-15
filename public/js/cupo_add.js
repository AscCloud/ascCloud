$(document).ready(function () {
    $("#cupon_add").click(function (e) {
        var valor = $("#valor_cupon").val();
        cadena='<tr>';
        cadena= cadena + '<td>'+valor+'<input type="hidden" id="valor_cupones_table" value="'+valor+'"/></td>';
        cadena= cadena + '</tr>';
        $("#datatable-responsive-cupones tbody").append(cadena);
    });
});
