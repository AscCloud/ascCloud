$(document).ready(function () {
    $(".btn-update-item").click(function (e) {
        var dot=$(this).data('id');
        var href=$(this).data('href');
        var cantidad=$("#cantidad_detalle_pedido_"+dot).val();
        var observacion=$("#observacion_detalle_pedido_"+dot).val();
        if(observacion!=''){
            window.location.href= href+"/"+cantidad+"/"+observacion;
        }else{
            window.location.href= href+"/"+cantidad;
        }
    });
});
