$(document).ready(function () {
    var loc= window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/'));
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
                    cadena='<input type="hidden" value="1" id="pedido_id"/>';
                    cadena= cadena + '<input type="hidden" value="2" id="cliente_id"/>';
                    cadena= cadena + '<table>';

                    cadena= cadena + '<tr>';
                    cadena= cadena + '<th colspan="3" style="text-align: center"><label style="font-size: 30px;">Factura</label></th>';
                    cadena= cadena + '</tr>';

                    cadena= cadena + '<tr>';
                    cadena= cadena + '<th style="text-align: justify"> <label>Local</label></th>';
                    cadena= cadena + '<th style="text-align: center"> <label>Orden:</label> </th>';
                    cadena= cadena + '<th style="text-align: center"> <label style="font-weight: lighter; !important">5</label></th>';
                    cadena= cadena + '</tr>';

                    cadena= cadena + '<tr>';
                    cadena= cadena + '<th style="text-align: justify; font-weight: bold;"><label>Cedula: </label></th>';
                    cadena= cadena + '<th colspan="2" style="text-align: justify"><label style="font-weight: lighter; !important">0504043258</label> </th>';
                    cadena= cadena + '</tr>';

                }
            }
        });

    });
});
