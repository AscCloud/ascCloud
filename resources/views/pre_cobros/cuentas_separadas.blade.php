@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cuentas Por Separado
        </h1>
    </section>
    <div class="content">
        @include('flash::message')
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
                        {{--  <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsive">
                            <thead>
                                <tr>
                                    <th colspan="4" style="text-align: center"><label style="font-size: 30px;">Factura</label></th>
                                </tr>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" value="1" id="codigo"/></td>
                                    <td>sa</td>
                                    <td>2</td>
                                    <td>asad</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="text-align:right" colspan="4"> Subtotal: </th>
                                </tr>
                                <tr>
                                    <th style="text-align:right" colspan="4"> Iva: 56</th>
                                </tr>
                                <tr>
                                    <th style="text-align:right" colspan="4"> Servicio: as</th>
                                </tr>
                                <tr>
                                    <th style="text-align:right" colspan="4"> Total: sd</th>
                                </tr>
                            </tfoot>
                        </table>  --}}
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
                                                    {!! Form::open(['url' => '/newcliente/separado']) !!}
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
    <script src="{{ asset('js/existencia_cliente_separados.js') }}"></script>
    <script type="text/javascript">
        $('#nacimiento_cliente').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false
        })
    </script>
    <script src="http://momentjs.com/downloads/moment.js"></script>
@endsection
