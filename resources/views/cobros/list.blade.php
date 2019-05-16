@extends('layouts.app')
@section('content')
<div class="content">
    @include('flash::message')
    <div class="box box-primary">
        <div class="box-body">
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsive">
                <thead>
                    <tr>
                        <th>Responsable</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="#detalle-table tbody">
                    @foreach($cobros as $cobro)
                        <tr>
                            <td>{!! $cobro->personal->nombre_personal !!}</td>
                            <td>{!! $cobro->fecha_cobro !!}</td>
                            <td>{!! $cobro->precobro->total_pre_cobro !!}</td>
                            <td>
                                <a href="{{ asset('/pdf/cobro') }}/{{ $cobro->id }}" style="background-color:#000 !important; border-color:#000 !important;" class="btn btn-warning btn-update-item"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @foreach($cobros as $cobro)
                <!--Pop up para mostrar la información -->
                <div class="modal fade" id="mostrar_{{ $cobro->id }}" >
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
                                        <a href="{{ url('/precobro/') }}/{!! $cobro->id !!}" class="btn btn-primary btn-update-item"><i class="fa fa-id-card"> Todo en una Cuenta</i></a>
                                    </div>
                                    <div class="form-group">
                                        <a href="{{ url('/precobro/separado/') }}/{!! $cobro->id !!}" class="btn btn-primary btn-update-item"><i class="fa fa-fax"> Cuentas por separadado</i></a>
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
