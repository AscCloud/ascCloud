<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  </head>
<body>
    <table>
        <tr>
            <td>Cliente</td>
        </tr>
        @foreach ($cabeceras as $cabecera)
            <tr>
                <td colspan="2">{{ $cabecera->nombre_cliente}}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3">Email</td>
        </tr>
        @foreach ($cabeceras as $cabecera)
            <tr>
                <td colspan="3" >{{ $cabecera->email_cliente  }}</label></td>
            </tr>
        @endforeach
        <tr>
            <td>Telefono</td>
        </tr>
        @foreach ($cabeceras as $cabecera)
            <tr>
                <td colspan="2">{{ $cabecera->telefono_cliente}}</td>
            </tr>
        @endforeach
        @foreach ($cabeceras as $cabecera)
            <tr>
                <td colspan="3">Fecha: {{ $cabecera->fecha_cobro}}</td>
            </tr>
        @endforeach
    </table>
    <table>
        <tr>
            <td>Producto</td>
            <td>Cantidad</td>
            <td>Subtotal</td>
        </tr>
        @foreach ($detalle_cabeceras as $detalle_cabecera)
            <tr>
                <td>{{ $detalle_cabecera->nombre_producto }}</th>
                <td>{{ $detalle_cabecera->cantidad_detalle_pedido }}</td>
                <td>{{ $detalle_cabecera->total_detalle_pedido }}</td>
            </tr>
        @endforeach
    </table>
    <table>
        @foreach ($cabeceras as $cabecera)
            <tr>
                <td colspan="2" style="text-align: right">Total:</td>
                <td>{{ $cabecera->total_pre_cobro }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
