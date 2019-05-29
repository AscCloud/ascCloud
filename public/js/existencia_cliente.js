$(document).ready(function () {
    var loc= window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/'));
    var pedido_id,cliente_id;
    var hoy= new Date();
    $('#ruc_cliente').change(function () {
        var ruc=$("#ruc_cliente").val();
        var token=$("#token").val();
        console.log(pathName);
        $.ajax({
            type: 'POST',
            url: pathName+'/cliente/' + ruc,
            data: { "_token": token},
            success: function (response) {
                if(Object.keys(response).length===0){
                    $("#mostrar").modal('show');
                }else{
                    $("#cliente_id").val(response[0]['id']);
                    pedido_id=$("#pedido_id").val();
                    $('#contenedor_precobro').empty();
                    $.ajax({
                        type: "GET",
                        url: pathName+"/pedido/"+pedido_id,
                        data: { "_token": token},
                        success: function (pedidos) {
                            cadena= '<table>';
                            cadena= cadena + '<tr>';
                            cadena= cadena + '<th colspan="3" style="text-align: center"><label style="font-size: 30px;">Factura</label></th>';
                            cadena= cadena + '</tr>';

                            cadena= cadena + '<tr>';
                            cadena= cadena + '<th style="text-align: center"> <label>'+pedidos[0]['nombre_sucursal']+'</label></th>';
                            cadena= cadena + '<th style="text-align: center"> <label>Orden: </label> </th>';
                            cadena= cadena + '<th style="text-align: center"> <label style="font-weight: lighter; !important">'+pedidos[0]['pedido_id']+'</label></th>';
                            cadena= cadena + '</tr>';

                            cadena= cadena + '<tr>';
                            cadena= cadena + '<th style="text-align: justify; font-weight: bold;"><label>Cedula: </label></th>';
                            cadena= cadena + '<th colspan="2" style="text-align: justify"><label style="font-weight: lighter; !important">'+response[0]['ruc_cliente']+'</label> </th>';
                            cadena= cadena + '</tr>';

                            cadena= cadena + '<tr>';
                            cadena= cadena + '<th style="text-align: justify; font-weight: bold;"><label>Nombre: </label></th>';
                            cadena= cadena + '<th colspan="2" style="text-align: justify"><label style="font-weight: lighter; !important">'+response[0]['nombre_cliente']+'</label> </th>';
                            cadena= cadena + '</tr>';

                            cadena= cadena + '<tr>';
                            cadena= cadena + '<th style="text-align: justify; font-weight: bold;"><label>Fecha: </label></th>';
                            cadena= cadena + '<th colspan="2" style="text-align: justify"><label style="font-weight: lighter; !important">'+moment(new Date(),"YYYY-MM-DD").format("MM-DD-YYYY")+'</label> </th>';
                            cadena= cadena + '</tr>';

                            cadena= cadena + '<tr>';
                            cadena= cadena + '<th style="text-align: justify; font-weight: bold;"><label>Total: </label></th>';
                            cadena= cadena + '<th colspan="2" style="text-align: justify"><label style="font-weight: lighter; !important" id="total_cuenta">'+pedidos[0]['total_pedido']+'</label> </th>';
                            cadena= cadena + '</tr>';

                            cadena= cadena + '<tr>';
                            cadena= cadena + '<th colspan="3"><div style="z-index: 8;" class="col-md-12"><div id="enviar" class="btn btn-success btn-update-item col-md-12"><i class="fa fa-save"> Enviar</i></div></div></th>';
                            cadena= cadena + '</tr>';

                            $('#contenedor_precobro').append(cadena);
                            $.getScript("/js/enviar_cobro.js", function () {});

                        }
                    });
                    //

                }
            }
        });

    });
});
