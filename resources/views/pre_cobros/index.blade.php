@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Todo en una cuenta
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::hidden('token', csrf_token(),['id'=>'token']) !!}
                    <!-- Ruc Cliente Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('ruc_cliente', 'Cedula') !!}
                        {!! Form::text('ruc_cliente', null, ['class' => 'form-control']) !!}
                    </div>
                    <div id="contenedor_precobro" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <input type="hidden" value="1" id="pedido_id"/>
                        <input type="hidden" value="2" id="cliente_id"/>
                        <table>
                               <tr>
                                    <th colspan="3" style="text-align: center"><label style="font-size: 30px;">Factura</label></th>
                                </tr>
                                <tr>
                                    <th style="text-align: justify"> <label>Local</label></th>
                                    <th style="text-align: center"> <label>Orden:</label> </th>
                                    <th style="text-align: center"> <label style="font-weight: lighter; !important">5</label> </th>
                                </tr>
                                <tr>
                                    <th style="text-align: justify; font-weight: bold;"><label>Cedula: </label></th>
                                    <th colspan="2" style="text-align: justify"><label style="font-weight: lighter; !important">0504043258</label> </th>
                                </tr>
                                <tr>
                                    <th style="text-align: justify"><label>Nombre: </label></th>
                                    <th colspan="2" style="text-align: justify"><label style="font-weight: lighter; !important"> Mauricio Leon</label> </th>
                                </tr>
                                <tr>
                                    <th style="text-align: justify"><label>Fecha: </label></th>
                                    <th colspan="2" style="text-align: justify"><label style="font-weight: lighter; !important">12/01/2019</label> </th>
                                </tr>
                                <tr>
                                    <th style="text-align: justify"> <label>Total: </label></th>
                                    <th colspan="2" style="text-align: justify"> <label style="font-weight: lighter; !important">12</label> </th>
                                </tr>
                                <tr>
                                    <th colspan="3"><a href="#" class="btn btn-success btn-update-item"><i class="fa fa-save"> Enviar</i></a></th>
                                </tr>
                            <tbody>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

            <!--Pop up para mostrar la información -->
                <div class="modal fade" id="mostrar" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                        <i class="glyphicon glyphicon-remove-circle"></i>
                                    </button>
                                    <label style="font-size: 30px">Registrar del Cliente</label>
                            </div>
                            <div class="modal-body">
                                    <div class="content">
                                        <div class="box box-primary">
                                            <div class="box-body">
                                                <div class="row">
                                                    {!! Form::open(['route' => 'clientes.store']) !!}
                                                        @include('clientes.fieldspop')
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/existencia_cliente.js') }}"></script>
    <script type="text/javascript">
        $('#nacimiento_cliente').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false
        })
    </script>
@endsection
