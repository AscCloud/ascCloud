$(document).ready(function () {
    var valor;
    $("#datatable-responsive-ejectivo").on("click",".del", function () {
        $(this).parents("tr").find(":hidden").each(function(index){
            valor=$(this).val();
        })
        var total_cuenta=$("#total_cuenta").text();
        total_cuenta=parseFloat(total_cuenta) + parseFloat(valor);
        $("#total_cuenta").text(total_cuenta);
        $(this).parents("tr").remove();
    });
    $("#datatable-responsive-cupones").on("click",".delc", function () {
        $(this).parents("tr").find(":hidden").each(function(index){
            valor=$(this).val();
        })
        var total_cuenta=$("#total_cuenta").text();
        total_cuenta=parseFloat(total_cuenta) + parseFloat(valor);
        $("#total_cuenta").text(total_cuenta);
        $(this).parents("tr").remove();
    });
    $("#datatable-responsive-tarjeta").on("click",".delt", function () {
        $(this).parents("tr").find("#valor_table").each(function(index){
            valor=$(this).val();
        })
        var total_cuenta=$("#total_cuenta").text();
        total_cuenta=parseFloat(total_cuenta) + parseFloat(valor);
        $("#total_cuenta").text(total_cuenta);
        $(this).parents("tr").remove();
    });
});
