$(document).ready(function () {
    var loc= window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/'));
    var pedido_id,cliente_id;
    var hoy= new Date();
    $('#ruc_cliente').change(function () {
        var ruc=$("#ruc_cliente").val();
        var token=$("#token").val();
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
                        url: pathName+"/pedido/total/"+pedido_id,
                        data: { "_token": token},
                        success: function (footer) {
                            cadena='<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsive">';
                            cadena= cadena + '<thead>';
                            cadena=cadena + '<tr>';
                            cadena=cadena + '<th colspan="4" style="text-align: center"><label style="font-size: 30px;">Factura</label></th>';
                            cadena=cadena + '</tr>';
                            cadena=cadena + '<tr>';
                            cadena=cadena + '<th>Codigo</th>';
                            cadena=cadena + '<th>Nombre</th>';
                            cadena=cadena + '<th>Cantidad</th>';
                            cadena=cadena + '<th>Total</th>';
                            cadena=cadena + '</tr>';
                            cadena=cadena + '</thead>';
                            cadena=cadena + '<tbody id="productos_detalle">'
                            cadena=cadena + '</tbody>';
                            cadena=cadena + '<tfoot>';
                            cadena=cadena + '<tr>';
                            cadena=cadena + '<th style="text-align:right" colspan="4"> Subtotal: '+footer[0]['subtotal_pedido']+' </th>';
                            cadena=cadena + '</tr>';
                            cadena=cadena + '<tr>';
                            cadena=cadena + '<th style="text-align:right" colspan="4"> Iva: '+footer[0]['iva_pedido']+'</th>';
                            cadena=cadena + '</tr>';
                            cadena=cadena + '<tr>';
                            cadena=cadena + '<th style="text-align:right" colspan="4"> Servicio: '+footer[0]['servicio_pedido']+'</th>';
                            cadena=cadena + '</tr>';
                            cadena=cadena + '<tr>';
                            cadena=cadena + '<th style="text-align:right" colspan="4"> Total: '+footer[0]['total_pedido']+'</th>';
                            cadena=cadena + '</tr>';
                            cadena=cadena + '</tfoot>'
                            cadena=cadena + '</table>';
                            cadena= cadena + '<div class="col-md-12"><div id="enviar" class="btn btn-success btn-update-item col-md-12"><i class="fa fa-save"> Enviar</i></div></div>';
                            $('#contenedor_precobro').append(cadena);
                            $.ajax({
                                type: "GET",
                                url: pathName+"/pedido/"+pedido_id,
                                data: { "_token": token},
                                success: function (pedidos) {
                                    pedidos.forEach(function(element,index){
                                        cadena2='<tr>';
                                        cadena2=cadena2 + '<td><input type="checkbox" value="'+element['id']+'" id="'+element['id']+'"/></td>';
                                        cadena2=cadena2 + '<td>'+element['nombre_producto']+'</td>';
                                        cadena2=cadena2 + '<td>'+element['cantidad_detalle_pedido']+'</td>';
                                        cadena2=cadena2 + '<td>'+element['total_detalle_pedido']+'</td>';
                                        cadena2=cadena2 + '</tr>';
                                        $("#datatable-responsive tbody").append(cadena2);
                                    });
                                    $.getScript("/ascCloud/public/js/seleccion_items.js", function () {});
                                }
                            });
                        }
                    });
                }
            }
        });

    });
});
