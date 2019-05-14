@extends('layouts.app')
@section('content')
<div class="content">
    @include('flash::message')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::hidden('token', csrf_token(),['id'=>'token']) !!}
            <input type="hidden" value="{{ Session::get('precobro_id') }}" id="precobro_id"/>
            <div class="form-group col-md-12" style="text-align: center;font-size: 30px;"><strong>Facturacion</strong></div>
            <div class="form-group col-md-12">
                <div class="col-md-2"><strong>Orden: </strong> 5</div>
                <div class="col-md-4"><strong>Cliente: </strong> Mauricio Leon</div>
                <div class="col-md-4"><strong>Fecha: </strong> {{ \Carbon\Carbon::today()->format('Y-m-d') }}</div>
                <div class="col-md-2" style="font-size: 20px;"><strong>Total: </strong> 4.5</div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label for="tipo">Tipo Cobro:</label>
                    <select id="tipo" class="form-control">
                        <option>--Seleccione--</option>
                        <option>Efectivo</option>
                        <option>Tarjeta</option>
                        <option>Cupones</option>
                    </select>
                </div>
            </div>
            <div id="Ejectivo" class="col-md-12">
                <div class="form-group col-md-10">
                    <label for="valor">Valor:</label>
                    <input id="valor" type="text" class="form-control"/>
                </div>
                <div class="form-group col-md-2">
                    <br>
                    <a href="#" style="background-color:#26c04d !important; border-color:#000 !important;" class="btn btn-warning btn-update-item"><i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div id="tarjeta_pago" class="col-md-12">
                <div class="form-group col-md-6">
                    <label for="tipo">Tipo Tarjeta:</label>
                    <select id="tipo" class="form-control">
                        <option>--Seleccione--</option>
                        <option>Debito</option>
                        <option>Credito</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="tipo_provedor">Provedor:</label>
                    <select id="tipo_provedor" class="form-control">
                        <option>--Seleccione--</option>
                        <option>Visa</option>
                        <option>Master Card</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="vaucher">Vaucher:</label>
                    <input id="vaucher" type="text" class="form-control"/>
                </div>
                <div class="form-group col-md-4">
                    <label for="valor">Valor:</label>
                    <input id="valor" type="text" class="form-control"/>
                </div>
                <div class="form-group col-md-2">
                    <br>
                    <a href="#" style="background-color:#26c04d !important; border-color:#000 !important;" class="btn btn-warning btn-update-item"><i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div class="col-md-6">
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsivess">
                    <thead>
                        <th style="text-align: center"><label style="font-size: 30px;">Ejectivo</label></th>
                        <tr>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>12.5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsives">
                    <thead>
                        <th colspan="2" style="text-align: center"><label style="font-size: 30px;">Tarjeta</label></th>
                        <tr>
                            <th>Vaucher</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1545664</td>
                            <td>12.5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12"><div id="enviar" class="btn btn-success btn-update-item col-md-12"><i class="fa fa-save"> Guardar</i></div></div>
        </div>


    </div>
</div>
@endsection
