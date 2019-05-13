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
                    $.ajax({
                        type: "GET",
                        url: pathName+"/pedido/"+pedido_id,
                        data: { "_token": token},
                        success: function (pedidos) {


                        }
                    });
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
                    cadena=cadena + '<tbody>'

                    cadena=cadena + '</tbody>'

                }
            }
        });

    });
});
