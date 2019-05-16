@extends('layouts.app')
@section('content')
<div class="content">
    @include('flash::message')
    <div class="box box-primary">
        <div class="box-body">
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsives">
                <tr>
                    <th colspan="3" style="text-align: center; font-size: 30px;">Factura</th>
                </tr>
                @foreach ($cabeceras as $cabecera)
                    <tr>
                        <td>Cliente: </td>
                        <td colspan="2">{{ $cabecera->nombre_cliente}}</td>
                    </tr>
                @endforeach
                @foreach ($cabeceras as $cabecera)
                    <tr>
                        <td>Email: </td>
                        <td colspan="2">{{ $cabecera->email_cliente  }} </td>
                    </tr>
                @endforeach
                @foreach ($cabeceras as $cabecera)
                    <tr>
                        <td>Telefono: </td>
                        <td colspan="2">{{ $cabecera->telefono_cliente}}</td>
                    </tr>
                @endforeach
                @foreach ($cabeceras as $cabecera)
                    <tr>
                        <td WIDTH="10%"> Fecha: </td>
                        <td colspan="3">Fecha: {{ $cabecera->fecha_cobro}}</td>
                    </tr>
                @endforeach

            </table>
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsives">
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
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsives">
                @foreach ($cabeceras as $cabecera)
                    <tr>
                        <td colspan="2" style="text-align: right">Total:</td>
                        <td>{{ $cabecera->total_pre_cobro }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
