@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style_normalize.css') }}" />
@endsection
@section('content')
<div class="content">
    @include('flash::message')
    <div class="box box-primary">
        <div class="box-body">
            <div class="col-md-12">
                @foreach ($pedido as $item)
                <div class="col-md-4">
                        <table>
                            <tr>
                                <th colspan="3" style="text-align: center"><label style="font-size: 30px;">Pedidos</label></th>
                            </tr>
                            <tr>
                                <th style="text-align: center"> <label>Orden: </label></th>
                                <th style="text-align: center"> <label style="font-weight: lighter; !important">{{ $item->id }}</label></th>
                            </tr>
                            <tr>
                                <th style="text-align: center"> <label>Entregar: </label></th>
                                <th style="text-align: center"><a href="{{ asset('/entregar') }}/{{ $item->id }}" style="z-index: 8;" class="col-md-12"><div id="enviar" class="btn btn-success btn-update-item col-md-12"><i class="fa fa-send"> Enviar</i></div></a></th>
                            </tr>
                        </table>
                            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsives">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Observacion</th>
                                <tr>
                                    @foreach ($productos[$item->id] as $producto)
                                        <tr>
                                            <td>{!! $producto->producto->nombre_producto !!}</td>
                                            <td>{!! $producto->cantidad_detalle_pedido !!}</td>
                                            <td>{!! $producto->observacion_detalle_pedido !!}</td>
                                        </tr>
                                    @endforeach
                            </table>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/recargartable.js') }}"></script>
@endsection
