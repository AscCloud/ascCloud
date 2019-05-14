$(document).ready(function () {

    $("#enviar").click(function (e) {
        var efectivo =new Array();
        var tarjeta =new Array();
        var vaucher_ar =new Array();
        var valor_ar =new Array();
        var tipo_tarjeta =new Array();
        var cupones =new Array();
        $("#ejectivo_detalle").find(":hidden").each(function(index){
            // efectivo.push({
            //     valor:$(this).val()
            // });
            alert($(this).val())
        });
        var n=$("#tarjeta_detalle tr").length;

        $("#tarjeta_detalle tr").find("#tarjeta_tipo_table").each(function(index){
            tipo_tarjeta.push($(this).val());
        });
        $("#tarjeta_detalle tr").find("#vaucher_table").each(function(index){
            vaucher_ar.push($(this).val());
        });
        $("#tarjeta_detalle tr").find("#valor_table").each(function(index){
            valor_ar.push($(this).val());
        });
        tipo_tarjeta.forEach((element,index) => {
            tarjeta.push({
                tipo: element,
                vaucher: vaucher_ar[index],
                valor: valor_ar[index]
            })
            console.log(element + " / "+ vaucher_ar[index]+ " / " + valor_ar[index]);
        });

        $("#cupones_detalle").find(":hidden").each(function(index){
            alert($("#valor_cupones_table").val())
        });
        tarjeta.forEach(element => {
            console.log("tarjeta: "+element['tipo']+ " / "+ element['vaucher'] + " / "+ element['valor']);
        });
    });
});
