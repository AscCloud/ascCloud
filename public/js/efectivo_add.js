$(document).ready(function () {
    var mensaje;
    $("#efectivo_add").click(function (e) {
        var total_cuenta=$("#total_cuenta").text();
        var valor = $("#valor_ejectivo").val();
        if(total_cuenta==0){
            mensaje="La cuenta se encuentra cancelada"
            $("#errorMessage").addClass("alert alert-error").html(mensaje);
        }else{
            if(valor>total_cuenta && total_cuenta!=0){
                mensaje="El valor ingresado es mayor a total de la cuenta por cobrar"
                $("#errorMessage").addClass("alert alert-error").html(mensaje);
            }else{
                if(total_cuenta!=0){
                    $("#errorMessage").empty();
                    $("#errorMessage").removeClass("alert alert-error");
                    cadena='<tr>';
                    cadena= cadena + '<td>'+valor+'<input type="hidden" id="valor_efectivo_table" value="'+valor+'"/></td>';
                    cadena= cadena + '<td><div id="cupon_add" style="background-color:#FF0000 !important; border-color:#FF0000 !important;" class="btn btn-warning btn-update-item del"><i class="fa fa-trash"></i></div></td>';
                    cadena= cadena + '</tr>';
                    $("#datatable-responsive-ejectivo tbody").append(cadena);
                    total_cuenta=parseFloat(total_cuenta).toFixed(2)-parseFloat(valor).toFixed(2);
                    $("#total_cuenta").text(parseFloat(total_cuenta).toFixed(2));
                }
            }
        }
    });
});
