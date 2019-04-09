@extends('layouts.app')
@section('content')
<div class="content">
    <div class="box box-primary">
        <div class="box-body">
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsive">
                <thead>
                    <tr>
                        <th>Numero de Orden</th>
                        <th>Personal</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Planta</th>
                        <th>Mesa</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="#detalle-table tbody">
                    @foreach($pedidos as $pedido)
                        <tr>
                            <td>{!! $pedido->id !!}</td>
                            <td>{!! $pedido->personal->nombre_personal !!}</td>
                            <td>{!! $pedido->fecha_pedido !!}</td>
                            <td>{!! \Carbon\Carbon::parse($pedido->created_at)->format('H:i:s') !!}</td>
                            <td>{!! $pedido->mesa->planta->nombre_planta !!}</td>
                            <td>{!! $pedido->mesa->numero_mesa !!}</td>
                            <td>{!! $pedido->total_pedido !!}</td>
                            <td>
                                <a href="#" style="background-color:#000 !important; border-color:#000 !important;" class="btn btn-warning btn-update-item"><i class="fa fa-eye"></i></a>
                                <a href="/pedido/edit/{!! $pedido->id !!}" class="btn btn-warning btn-update-item"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
