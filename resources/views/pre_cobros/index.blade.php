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
                    <input type="hidden" value="{{ Session::get('pedido_id') }}" id="pedido_id"/>
                    <input type="hidden" id="cliente_id"/>
                    <div id="contenedor_precobro" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                                                    {!! Form::open(['url' => '/newcliente']) !!}
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
    <script src="{{ asset('js/seleccion_items.js') }}"></script>
    <script type="text/javascript">
        $('#nacimiento_cliente').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false
        })
    </script>
    <script src="http://momentjs.com/downloads/moment.js"></script>
@endsection
