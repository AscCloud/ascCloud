$(document).ready(function () {
    $("#empresa_id").change(function (e) {
        var id = $("#empresa_id").val();
        var token = $("#token").val();
        $.ajax({
            type: "POST",
            url: "/empresa/find/"+id,
            data: { "_token": token },
            success: function (response) {
                if(response == "-1"){
                    console.log(data);
                    $("#menuMessage").addClass("alert alert-error").html("Usuario no encontrado");
                    $("#clientesc").val("");
                    $('#pops').modal('show');
                }
                else{
                    var fillSecondary = function(){
                      var selected = $('#empresa_id').val();
                      $('#sucursal_id').empty();
                      cadena='<option value=0>---Selecione---</option>';
                      response.forEach(function(element,index){
                        cadena=cadena+ '<option value="'+element['id']+'">'+element['nombre_sucursal']+'</option>';

                      });
                      $('#sucursal_id').append(cadena);
                    }
                    fillSecondary();
                }
            }
        });
    });
});
