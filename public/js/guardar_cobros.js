$(document).ready(function () {
    var mensaje;
    var loc= window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/'));
    $("#enviar").click(function (e) {
        var total_cuenta=$("#total_cuenta").text();
        if(total_cuenta==0){
            $("#errorMessage").empty();
            $("#errorMessage").removeClass("alert alert-error");
            var precobro=$("#precobro_id").val();
            var token=$("#token").val();
            var efectivo =new Array();
            var tarjeta =new Array();
            var vaucher_ar =new Array();
            var valor_ar =new Array();
            var tipo_tarjeta =new Array();
            var cupones =new Array();
            $("#ejectivo_detalle").find(":hidden").each(function(index){
                efectivo.push({
                    valor:$(this).val()
                });
            });
            $("#cupones_detalle").find(":hidden").each(function(index){
                cupones.push({
                    valor:$(this).val()
                });
            });
            $("#tarjeta_detalle tr").find("#tarjeta_tipo_table").each(function(index){
                tipo_tarjeta.push($(this).val());
            });
            $("#tarjeta_detalle tr").find("#vaucher_table").each(function(index){
                vaucher_ar.push($(this).val());
            });
            $("#tarjeta_detalle tr").find("#valor_table").each(function(index){
                valor_ar.push($(this).val());
            });
            if( tipo_tarjeta.length!=0){
                tipo_tarjeta.forEach((element,index) => {
                    tarjeta.push({
                        tipo: element,
                        vaucher: vaucher_ar[index],
                        valor: valor_ar[index]
                    })
                });
            }

            $.ajax({
                type: "POST",
                url: pathName,
                data: { "_token": token, "precobro_id": precobro, "efectivo": JSON.stringify(efectivo), "tarjeta":JSON.stringify(tarjeta), "cupones":JSON.stringify(cupones)},
                success: function (response) {
                    window.location.href=pathName;
                }
            });
        }else{
            mensaje="La cuenta no se encuentra cobrada completamente"
            $("#errorMessage").addClass("alert alert-error").html(mensaje);
        }
    });
});
