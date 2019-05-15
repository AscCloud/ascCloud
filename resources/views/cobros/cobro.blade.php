@extends('layouts.app')
@section('content')
<div class="content">
    <div id="errorMessage"></div>
    @include('flash::message')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::hidden('token', csrf_token(),['id'=>'token']) !!}
            <input type="hidden" value="{{ Session::get('precobro_id') }}" id="precobro_id"/>
            <div class="form-group col-md-12" style="text-align: center;font-size: 30px;"><strong>Facturación</strong></div>
            <div class="form-group col-md-12">
                <div class="col-md-2"><strong>Orden: </strong> 5</div>
                <div class="col-md-4"><strong>Cliente: </strong> Mauricio Leon</div>
                <div class="col-md-4"><strong>Fecha: </strong> {{ \Carbon\Carbon::today()->format('Y-m-d') }}</div>
                <div class="col-md-2" style="font-size: 20px;"><strong>Total: </strong> <label style="font-weight: lighter; !important" id="total_cuenta">4.5</label></div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label for="tipos_cobros">Tipo Cobro:</label>
                    <select id="tipos_cobros" class="form-control">
                        <option>--Seleccione--</option>
                        <option>Efectivo</option>
                        <option>Tarjeta</option>
                        <option>Cupones</option>
                    </select>
                </div>
            </div>
            <div id="Ejectivo" class="col-md-12">
            </div>
            <div id="tarjeta_pago" class="col-md-12">
            </div>
            <div class="col-md-4">
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsive-ejectivo">
                    <thead>
                        <th colspan="2" style="text-align: center"><label style="font-size: 30px;">Ejectivo</label></th>
                        <tr>
                            <th>Valor</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody id="ejectivo_detalle">
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsive-cupones">
                    <thead>
                        <th colspan="2" style="text-align: center"><label style="font-size: 30px;">Cupones</label></th>
                        <tr>
                            <th>Valor</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody id="cupones_detalle">
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsive-tarjeta">
                    <thead>
                        <th colspan="4" style="text-align: center"><label style="font-size: 30px;">Tarjeta</label></th>
                        <tr>
                            <th>Tarjeta</th>
                            <th>Vaucher</th>
                            <th>Valor</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody id="tarjeta_detalle">
                    </tbody>
                </table>
            </div>
            <div class="col-md-12"><div id="enviar" class="btn btn-success btn-update-item col-md-12"><i class="fa fa-save"> Guardar</i></div></div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/tipo_cobros.js') }}"></script>
    <script src="{{ asset('js/guardar_cobros.js') }}"></script>
    <script src="{{ asset('js/delete_tr.js') }}"></script>
@endsection
