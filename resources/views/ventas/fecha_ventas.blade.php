@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style_normalize.css') }}" />
@endsection
@section('content')
<div class="content">
    @include('flash::message')
    <div class="box box-primary">
        <div class="box-body">
                <div class="form-group col-sm-8">
                    {!! Form::hidden('token', csrf_token(),['id'=>'token']) !!}
                    {!! Form::label('fecha', 'Fecha') !!}
                    {!! Form::text('fecha', null, ['class' => 'form-control','id'=>'fecha']) !!}
                </div>
                <div class="form-group col-sm-2">
                        <br>
                        <div id="consulta" style="background-color:#3c8dbc !important; border-color:#3c8dbc !important;" class="btn btn-warning btn-update-item col-sm-6">Consultar</div>
                </div>
                <div id="contenedor_ventas" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/ventas_fecha.js') }}"></script>
    <script type="text/javascript">
        $('#fecha').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false
        })
    </script>
@endsection
