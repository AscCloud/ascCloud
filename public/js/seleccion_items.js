$(document).ready(function () {

    $("#enviar").click(function () {
        var productos_ids=new Array();
        $('#productos_detalle').find(':checkbox').each(function(index){
            if($(this).is(':checked')){
                productos_ids.push($(this).attr('id'));
            }
        });
        alert(productos_ids);
    });
});
