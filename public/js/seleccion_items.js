$(document).ready(function () {
    var loc= window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/'));
    $("#enviar").click(function () {
        var pedido_id=$("#pedido_id").val();
        var cliente_id=$("#cliente_id").val();
        var token=$("#token").val();
        var productos_ids=new Array();
        $('#productos_detalle').find(':checkbox').each(function(index){
            if($(this).is(':checked')){
                productos_ids.push($(this).attr('id'));
            }
        });
        $.ajax({
            type: "POST",
            url: pathName,
            data: { "_token": token, "cliente_id": cliente_id, "pedido_id": pedido_id, "productos_ids": JSON.stringify(productos_ids)},
            success: function (response) {
                window.location.href=window.location.href;
            }
        });
    });
});
