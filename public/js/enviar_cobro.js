$(document).ready(function () {
    var loc= window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/'));
    $("#enviar").click(function () {
        var pedido_id=$("#pedido_id").val();
        var cliente_id=$("#cliente_id").val();
        var total_cuenta=$("#total_cuenta").text();
        var token=$("#token").val();
        $.ajax({
            type: "POST",
            url: pathName,
            data: { "_token": token, "cliente_id": cliente_id, "pedido_id": pedido_id, "total_cuenta": total_cuenta},
            success: function (response) {
                window.location.href=window.location.href;
            }
        });
    });
});
