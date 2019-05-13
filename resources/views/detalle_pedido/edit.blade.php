@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style_normalize.css') }}" />
@endsection
@section('content')
<div class="content">
    @include('flash::message')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row" style="margin:5px">
                <div class="col-lg-6 col-xs-6">
                    <a href="{{ asset('/agregar') }}" class="btn btn-primary col-lg-12 col-xs-12" ><i class="fa fa-arrow-circle-left"></i> Agregar</a>
                </div>
                <div class="col-lg-6 col-xs-6">
                    <a href="{{ asset('/agregar/create') }}" class="btn btn-success col-lg-12 col-xs-12" ><i class="fa fa-save"></i> Guardar</a>
                </div>
            </div>
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsive">
                <thead>
                    <tr>
                        <th style="width: 20%">Imagen</th>
                        <th>Nombre</th>
                        <th style="width: 10%">Cantidad</th>
                        <th>Observacion</th>
                        <th style="width: 5%">Acciones</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $clave=>$car)
                        <tr>
                            <td><img class="imagen_productos" src="{{ $car->img_producto }}"/> </td>
                            <td>{!! $car->nombre_producto !!}</td>
                            @if ($car->estado_detalle_pedido==false)
                                <td><div class="row"><div class="col-lg-12"><input style="width: 100%" type="text" class="form-control" id="cantidad_detalle_pedido_{{ $clave }}" value="{!!  $car->cantidad_detalle_pedido!!}"/></div></div></td>
                                <td><div class="row"><div class="col-lg-12"><input style="width: 100%" type="text" class="form-control" id="observacion_detalle_pedido_{{ $clave }}" value="{!! $car->observacion_detalle_pedido !!}"/></div></div></td>
                            @else
                                <td><div class="row"><div class="col-lg-12">{!!  $car->cantidad_detalle_pedido!!}</div></div></td>
                                <td><div class="row"><div class="col-lg-12">{!!  $car->cantidad_detalle_pedido!!}</div></div></td>
                            @endif
                            @if ($car->estado_detalle_pedido==false)
                                <td><a href="#" class="btn btn-warning btn-update-item" data-id="{{ $clave }}" data-href="{!! asset('/agregar/detalle/update')!!}/{!! $car->producto_id !!}/{!! $clave !!}"><i class="fa fa-refresh"></i></a> <a class="btn btn-danger" href="{!! asset('/agregar/detalle/eliminar')!!}/{!! $car->producto_id !!}/{!! $clave !!}"><i class="fa fa-remove"></i></td>
                            @else
                                <td>Entregado</td>
                            @endif
                            <td>{!! number_format($car->precio_producto * $car->cantidad_detalle_pedido,2) !!}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th style="text-align:right" colspan="6"> Subtotal: {{ number_format(round($subtotal,2) ,2) }}</th>
                    </tr>
                    <tr>
                        <th style="text-align:right" colspan="6"> Iva:
                                @if ($iva!='')
                                {{ number_format(round($subtotal*($iva/100),2) ,2) }}
                            @else
                                {{ number_format(round(0,2) ,2) }}
                            @endif
                        </th>
                    </tr>
                    <tr>
                        <th style="text-align:right" colspan="6"> Servicio: {{ number_format(round($servicio,2),2) }}</th>
                    </tr>
                    <tr>
                        <th style="text-align:right" colspan="6"> Total: {{ number_format(round($total,2),2) }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/update_cart.js') }}"></script>
@endsection
