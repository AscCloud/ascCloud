$(document).ready(function () {
    var loc= window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/'));
    $("#categoria_id").change(function (e) {
        var id = $("#categoria_id").val();
        var token = $("#token").val();
        $.ajax({
            type: "POST",
            url: pathName+"/categorias/find/"+id,
            data: { "_token": token, "id": id},
            success: function (response) {
                if(response == "-1"){
                    $("#menuMessage").addClass("alert alert-error").html("Planta no encontrado");
                    $("#clientesc").val("");
                    $('#pops').modal('show');
                }
                else{
                    var origin = window.location.origin
                    var fillSecondary = function(){
                      var selected = $('#categoria_id').val();
                      $('#contenedor_producto').empty();
                      response.forEach(function(element,index){
                            cadena='<div class="col-sm-2 col-xs-4">'
                            cadena=cadena+'<img class="imagen_producto" src="'+element['img_producto']+'"/>';
                            cadena=cadena +'<a href="'+origin+pathName+'/agregar/detalle/add/'+element['id']+'"><div class="form-group col-sm-12 col-xs-12 btn btn-success"><span style="color:white" class="glyphicon glyphicon-plus"</span></div></a>';
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
