$(document).ready(function () {
    $("#tarjeta_add").click(function (e) {
        var tipo = $("#tipo_tarjeta").val();
        var valor = $("#valor_tarjeta").val();
        var vaucher = $('#vaucher').val();
        cadena ='<tr>';
        cadena = cadena +'<td>' + tipo + '<input type="hidden"  id="tarjeta_tipo_table" value="'+tipo+'"/></td>';
        cadena = cadena + '<td>' + vaucher + '<input type="hidden" id="vaucher_table" value="'+vaucher+'"/></td>';
        cadena = cadena + '<td>' + valor + '<input type="hidden" id="valor_table" value="'+valor+'"/></td>';
        cadena = cadena + '</tr>';
        $("#datatable-responsive-tarjeta tbody").append(cadena);
    });
});
