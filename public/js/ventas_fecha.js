$(document).ready(function () {
    var loc= window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/'));
    $("#consulta").click(function (e) {
        $('#contenedor_ventas').empty();
        var pop= new Array();
        var fecha=$("#fecha").val();
        if(fecha==""){
            fecha="hoy";
        }
        var token=$("#token").val();
        cadena='<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsives">';
        cadena= cadena + '<tr>';
        cadena= cadena + '<th colspan="2" style="text-align: center; font-size: 30px;"> Ventas</th>';
        cadena= cadena + '</tr>';
        cadena= cadena + '<div id="detalle"></div>'
        cadena=cadena + '</table>'
        $("#contenedor_ventas").append(cadena);
        $.ajax({
            type: "POST",
            url: pathName+"/ventas",
            data: { "_token": token, "fecha":fecha},
            success: function (response) {
                response.forEach((element,index) => {
                    cadena1= '<tr>'
                    cadena1=cadena1 + '<td>Producto</td>';
                    cadena1=cadena1 + '<td>'+element['nombre_producto']+'</td>';
                    cadena1=cadena1 + '</tr>'
                    cadena1=cadena1 + '<tr>'
                    cadena1=cadena1 + '<td>Cantidad</th>';
                    cadena1=cadena1 + '<td>'+element['total']+'</td>';
                    cadena1=cadena1 + '</tr>'
                    pop.push(cadena1);
                });
                $("#datatable-responsives").append(pop);
            }
        });
    });
});
