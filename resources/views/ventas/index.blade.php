@extends('layouts.app')
@section('content')
<div class="content">
    @include('flash::message')
    <div class="box box-primary">
        <div class="box-body">
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsives">
                <tr>
                    <th colspan="2" style="text-align: center; font-size: 30px;"> Ventas</th>
                </tr>
                @foreach ($productos as $producto)
                    <tr>
                        <td>Producto</th>
                        <td>{{ $producto->nombre_producto }}</td>
                    </tr>
                    <tr>
                        <td>Cantidad</th>
                        <td>{{ $producto->total }}</td>

                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
