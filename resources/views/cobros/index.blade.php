@extends('layouts.app')
@section('content')
<div class="content">
    @include('flash::message')
    <div class="box box-primary">
        <div class="box-body">
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsive">
                <thead>
                    <tr>
                        <th>Orden</th>
                        <th>Nombre</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="#detalle-table tbody">
                    @foreach($cobros as $cobro)
                        <tr>
                            <td>{!! $cobro->pedido_id !!}</td>
                            <td>{!! $cobro->cliente->nombre_cliente !!}</td>
                            <td>{!! $cobro->total_pre_cobro !!}</td>
                            <td>
                                <a href="{{ asset('/cobro') }}/{{ $cobro->id }}" style="background-color:#26c04d !important; border-color:#000 !important;" class="btn btn-warning btn-update-item"><i class="fa fa-money"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
