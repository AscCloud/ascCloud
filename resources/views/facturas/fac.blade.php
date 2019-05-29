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
    <br>
    <br>
    <p style="margin-left: 70px">Subtotal: {{ $subtotal }}</p>
    <p style="margin-left: 102px">Iva: {{ $iva }}</p>
    @if (Auth::user()->personal->sucursal->cobro_servicio_sucursal==true)
        <p style="margin-left: 70px">Servicio: {{ $servicio }}</p>    
    @endif
    
    @foreach ($cabeceras as $cabecera)
        <p style="margin-left: 90px">Total: {{ $cabecera->total_pre_cobro }}</p>
    @endforeach
</body>
</html>
