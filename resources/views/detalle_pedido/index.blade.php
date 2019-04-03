@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style_normalize.css') }}" />
@endsection
@section('content')
<div class="content">
    <div class="box box-primary">
        <div class="box-body">
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsive">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Observacion</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $car)
                        <tr>
                            <td><img class="imagen_productos" src="{{ $car->img_producto }}"/> </td>
                            <td>{!! $car->nombre_producto !!}</td>
                            <td><input class="form-control" name="cantidad_detalle_pedido" value="{!!  $car->cantidad_detalle_pedido!!}"/></td>
                            <td><input class="form-control" name="observacion_detalle_pedido" value="{!! $car->observacion_detalle_pedido !!}"/></td>
                            <td>{!! $car->total_detalle_pedido !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
