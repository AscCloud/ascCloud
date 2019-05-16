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
                <div class="col-lg-12 col-xs-12">
                    <a href="{{ asset('/pedido/list') }}" class="btn btn-danger col-lg-12 col-xs-12" ><i class="fa fa-arrow-circle-left"></i> Regresar </a>
                </div>
            </div>
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsive">
                <thead>
                    <tr>
                        <th style="width: 20%">Imagen</th>
                        <th>Nombre</th>
                        <th style="width: 10%">Cantidad</th>
                        <th>Observacion</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $clave=>$car)
                        <tr>
                            <td><img class="imagen_productos" src="{{ $car->img_producto }}"/> </td>
                            <td>{!! $car->nombre_producto !!}</td>
                            <td>{!! $car->cantidad_detalle_pedido !!}</td>
                            <td>{!! $car->observacion_detalle_pedido !!}</td>

                            <td>{!! number_format($car->precio_producto * $car->cantidad_detalle_pedido,2) !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/update_cart.js') }}"></script>
@endsection
