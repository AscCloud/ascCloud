$(document).ready(function () {
    var mensaje;
    $("#cupon_add").click(function (e) {
        var valor = $("#valor_cupon").val();
        var total_cuenta=$("#total_cuenta").text();
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
                    cadena= cadena + '<td>'+valor+'<input type="hidden" id="valor_cupones_table" value="'+valor+'"/></td>';
                    cadena= cadena + '<td><div id="cupon_add" style="background-color:#FF0000 !important; border-color:#FF0000 !important;" class="btn btn-warning btn-update-item delc"><i class="fa fa-trash"></i></div></td>';
                    cadena= cadena + '</tr>';
                    $("#datatable-responsive-cupones tbody").append(cadena);
                    total_cuenta=total_cuenta-valor;
                    $("#total_cuenta").text(total_cuenta);
                }
            }
        }
    });
});
