$(document).ready(function () {
    $("#categoria_id").change(function (e) {
        var id = $("#categoria_id").val();
        var token = $("#token").val();
        $.ajax({
            type: "POST",
            url: "/categorias/find/"+id,
            data: { "_token": token, "id": id},
            success: function (response) {
                if(response == "-1"){
                    $("#menuMessage").addClass("alert alert-error").html("Planta no encontrado");
                    $("#clientesc").val("");
                    $('#pops').modal('show');
                }
                else{
                    var fillSecondary = function(){
                      var selected = $('#categoria_id').val();
                      $('#contenedor_producto').empty();
                      response.forEach(function(element,index){
                            cadena='<div class="col-sm-12 col-xs-12">'
                            cadena=cadena+'<img class="imagen_producto" src="<?php echo e(Storage::url('+element['img_producto']+')); ?>"/>';
                            cadena=cadena +'<div class="form-group col-sm-12 col-xs-12 btn btn-success"><a href="#"><span style="color:white" class="glyphicon glyphicon-plus"</span></a></div>';
                            cadena=cadena +'</div>';
                          $('#contenedor_producto').append(cadena);
                      });

                    }
                    fillSecondary();
                }
            }
        }).fail(function( jqXHR, textStatus, errorThrown ) {
            alert( 'Error!!'+errorThrown );
        });
    });
});
