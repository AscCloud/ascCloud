@extends('layouts.app')
@section('content')
<div class="content">
    @include('flash::message')
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
                                <a href="{{ url('/pedido/edit/') }}/{!! $pedido->id !!}" class="btn btn-warning btn-update-item"><i class="fa fa-edit"></i></a>
                                <a href="#" data-toggle="modal" data-target="#mostrar" class="btn btn-primary btn-update-item"><i class="fa fa-book"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @foreach($pedidos as $pedido)
                <!--Pop up para mostrar la información -->
                <div class="modal fade" id="mostrar" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                        <i class="glyphicon glyphicon-remove-circle"></i>
                                    </button>
                                    <label style="font-size: 30px">Pedido de la Cuenta</label>
                            </div>
                            <div class="modal-body">
                                    <div class="form-group">
                                        <a href="{{ url('/precobro/') }}/{!! $pedido->id !!}" class="btn btn-primary btn-update-item"><i class="fa fa-id-card"> Todo en una Cuenta</i></a>
                                    </div>
                                    <div class="form-group">
                                        <a href="{{ url('/precobro/') }}/{!! $pedido->id !!}" class="btn btn-primary btn-update-item"><i class="fa fa-fax"> Cuentas por separadado</i></a>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <a href="{!! url('/pedido/list') !!}" class="btn btn-danger" data-dismiss="modal">Regresar</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
