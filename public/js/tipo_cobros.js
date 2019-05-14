$(document).ready(function () {
    var loc= window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/')-10);
    $("#tipos_cobros").change(function (e) {
        var tipo_cobro=$("#tipos_cobros").val();
        if(tipo_cobro=="Efectivo"){
            console.log("e");
            $('#Ejectivo').empty();
            $('#tarjeta_pago').empty();
            cadena='<div class="form-group col-md-10">';
            cadena= cadena + '<label for="valor">Valor:</label>';
            cadena= cadena + '<input id="valor_ejectivo" type="text" class="form-control"/>';
            cadena= cadena + '</div>'
            cadena= cadena + '<div class="form-group col-md-2">';
            cadena= cadena + '<br>'
            cadena= cadena + '<div id="efectivo_add" style="background-color:#26c04d !important; border-color:#000 !important;" class="btn btn-warning btn-update-item"><i class="fa fa-plus"></i></div>'
            cadena= cadena + '</div>';
            $("#Ejectivo").append(cadena);
            $.getScript("/ascCloud/public/js/efectivo_add.js", function () {});
        }else if(tipo_cobro=="Tarjeta"){
            console.log("t");
            $('#Ejectivo').empty();
            $('#tarjeta_pago').empty();
            cadena='<div class="form-group col-md-12">';
            cadena= cadena + '<label for="tipo_tarjeta">Tipo Tarjeta:</label>';
            cadena= cadena + '<select id="tipo_tarjeta" class="form-control">';
            cadena= cadena + '<option>--Seleccione--</option>';
            cadena= cadena + '<option>Debito</option>';
            cadena= cadena + '<option>Credito</option>';
            cadena= cadena + '</select>';
            cadena= cadena + '</div>';
            cadena= cadena + '<div class="form-group col-md-6">';
            cadena= cadena + '<label for="vaucher">Vaucher:</label>';
            cadena= cadena + '<input id="vaucher" type="text" class="form-control"/>';
            cadena= cadena + '</div>';
            cadena= cadena + '<div class="form-group col-md-4">';
            cadena= cadena + '<label for="valor">Valor:</label>';
            cadena= cadena + '<input id="valor_tarjeta" type="text" class="form-control"/>';
            cadena= cadena + '</div>';
            cadena= cadena + '<div class="form-group col-md-2">';
            cadena= cadena + '<br>';
            cadena= cadena + '<div id="tarjeta_add" style="background-color:#26c04d !important; border-color:#000 !important;" class="btn btn-warning btn-update-item"><i class="fa fa-plus"></i></div>';
            cadena= cadena + '</div>'
            $('#tarjeta_pago').append(cadena);
            $.getScript("/ascCloud/public/js/tarjeta_add.js", function () {});
        }else if(tipo_cobro=="Cupones"){
            console.log("c");
            $('#Ejectivo').empty();
            $('#tarjeta_pago').empty();
            cadena='<div class="form-group col-md-10">';
            cadena= cadena + '<label for="valor">Valor:</label>';
            cadena=cadena + '<input id="valor_cupon" type="text" class="form-control"/>';
            cadena=cadena + '</div>'
            cadena= cadena + '<div class="form-group col-md-2">';
            cadena= cadena + '<br>'
            cadena= cadena + '<div id="cupon_add" style="background-color:#26c04d !important; border-color:#000 !important;" class="btn btn-warning btn-update-item"><i class="fa fa-plus"></i></div>'
            cadena= cadena + '</div>';
            $("#Ejectivo").append(cadena);
            $.getScript("/ascCloud/public/js/cupo_add.js", function () {});
        }else{
            $('#Ejectivo').empty();
            $('#tarjeta_pago').empty();
            console.log("seleccione una de las opciones");
        }
    });
});
