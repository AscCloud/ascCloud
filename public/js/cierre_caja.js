$(document).ready(function () {
    var loc= window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/'));
    console.log(pathName);
    $("#consulta").click(function (e) {
        $('#contenedor_cierre').empty();
        var pop= new Array();
        var fecha=$("#fecha").val();
        if(fecha==""){
            fecha="hoy";
        }
        var token=$("#token").val();
        cadena='<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsives">';
        cadena= cadena + '<tr>';
        cadena= cadena + '<th colspan="2" style="text-align: center; font-size: 30px;"> Cierre Caja</th>';
        cadena= cadena + '</tr>';
        cadena= cadena + '<div id="detalle"></div>'
        cadena=cadena + '</table>'
        $("#contenedor_cierre").append(cadena);
        $.ajax({
            type: "POST",
            url: pathName+"/caja",
            data: { "_token": token, "fecha":fecha},
            success: function (response) {
                response.forEach((element,index) => {
                    cadena1= '<tr>'
                    cadena1=cadena1 + '<td>Cobro</td>';
                    cadena1=cadena1 + '<td>'+element['tipo_cobro']+'</td>';
                    cadena1=cadena1 + '</tr>'
                    cadena1=cadena1 + '<tr>'
                    cadena1=cadena1 + '<td>Cantidad</td>';
                    cadena1=cadena1 + '<td>'+element['cantidad']+'</td>';
                    cadena1=cadena1 + '</tr>'
                    cadena1=cadena1 + '<td>Cantidad</td>';
                    cadena1=cadena1 + '<td>'+element['valor_cobro']+'</td>';
                    cadena1=cadena1 + '</tr>'
                    pop.push(cadena1);
                });
                $("#datatable-responsives").append(pop);
            }
        });
    });
});
