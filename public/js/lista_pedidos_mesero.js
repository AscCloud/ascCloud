$(document).ready(function () {
    var loc= window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/'));
    $("#consulta").click(function (e) {
        var pop= new Array();
        $('#contenedor_pedido').empty();
        var fecha=$("#fecha").val();
        var codigo=$("#codigo").val();
        if(fecha==""){
            fecha="hoy";
        }
        var token=$("#token").val();
        cadena='<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsives">';
        cadena= cadena + '<thead>';
        cadena= cadena + '<tr>';
        cadena= cadena + '<th>Numero de Orden</th>';
        cadena= cadena + '<th>Personal</th>';
        cadena= cadena + '<th>Fecha</th>';
        cadena= cadena + '<th>Hora</th>';
        cadena= cadena + '<th>Planta</th>';
        cadena= cadena + '<th>Mesa</th>';
        cadena= cadena + '<th>Total</th>';
        cadena= cadena + '<th>Acciones</th>';
        cadena= cadena + '</tr>';
        cadena= cadena + '</thead>'
        cadena= cadena + '<tbody id="detalle-table">';
        cadena= cadena + '</tbody>'
        cadena=cadena + '</table>'
        $("#contenedor_pedido").append(cadena);
        $.ajax({
            type: "POST",
            url: pathName+"/datosmesero",
            data: { "_token": token, "fecha":fecha},
            success: function (response) {
                response.forEach((element,index) => {
                    var origin = window.location.origin
                    cadena2='<tr>';
                    cadena2=cadena2 + '<td>'+element['id']+'</td>';
                    cadena2=cadena2 + '<td>'+element['nombre_personal']+'</td>';
                    cadena2=cadena2 + '<td>'+element['fecha_pedido']+'</td>';
                    hora=moment(element['updated_at']).format("HH:mm");
                    cadena2=cadena2 + '<td>'+hora+'</td>';
                    cadena2=cadena2 + '<td>'+element['nombre_planta']+'</td>';
                    cadena2=cadena2 + '<td>'+element['numero_mesa']+'</td>';
                    cadena2=cadena2 + '<td>'+element['total_pedido']+'</td>';
                    cadena2=cadena2 + '<td>';
                    cadena2=cadena2 + '<a href="'+origin+pathName+'/detalle/'+element['id']+'" style="background-color:#000 !important; border-color:#000 !important;" class="btn btn-warning btn-update-item"><i class="fa fa-eye"></i></a>';
                    cadena2=cadena2 + '<a href="'+origin+pathName+'/edit/'+element['id']+'" class="btn btn-warning btn-update-item"><i class="fa fa-edit"></i></a>'
                    cadena2=cadena2 + '<a href="#" data-toggle="modal" data-target="#mostrar_'+element['id']+'" class="btn btn-primary btn-update-item"><i class="fa fa-book"></i></a>'
                    cadena2=cadena2 + '</td>';
                    cadena2=cadena2 + '</tr>';
                    $("#datatable-responsives tbody").append(cadena2);
                    cadena3='<div class="modal fade" id="mostrar_'+element['id']+'">';
                    cadena3=cadena3 + '<div class="modal-dialog">';
                    cadena3=cadena3 + '<div class="modal-content">';
                    cadena3=cadena3 + '<div class="modal-header">';
                    cadena3=cadena3 + '<button type="button" class="close" data-dismiss="modal">';
                    cadena3=cadena3 + '<i class="glyphicon glyphicon-remove-circle"></i>';
                    cadena3=cadena3 + '</button>';
                    cadena3=cadena3 + '<label style="font-size: 30px">Pedido de la Cuenta</label>';
                    cadena3=cadena3 + '</div>';
                    cadena3=cadena3 + '<div class="modal-body">';
                    cadena3=cadena3 + '<div class="form-group">';
                    cadena3=cadena3 + '<a href="'+origin+'/ascCloud/public/precobro/'+element['id']+'" class="btn btn-primary btn-update-item"><i class="fa fa-id-card"> Todo en una Cuenta</i></a>';
                    cadena3=cadena3 + '</div>';
                    cadena3=cadena3 + '<div class="form-group">';
                    cadena3=cadena3 + '<a href="'+origin+'/ascCloud/public/precobro/separado/'+element['id']+'" class="btn btn-primary btn-update-item"><i class="fa fa-fax"> Cuentas por separadado</i></a>';
                    cadena3=cadena3 + '</div>';
                    cadena3=cadena3 + '</div>';
                    cadena3=cadena3 + '<div class="modal-footer">';
                    cadena3=cadena3 + '<a href="'+origin+pathName+'/caja" class="btn btn-danger" data-dismiss="modal">Regresar</a>';
                    cadena3=cadena3 + '</div>';
                    cadena3=cadena3 + '</div>';
                    cadena3=cadena3 + '</div>';
                    cadena3=cadena3 + '</div>';
                    pop.push(cadena3);
                });
                $("#contenedor_pedido_pop").append(pop);
            }
        });
    });
});
