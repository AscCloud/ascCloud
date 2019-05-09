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
                    {!! Form::label('categoria_id', 'Categoria') !!}
                    {!! Form::select('categoria_id', $cat, null, ['class' => 'form-control','id'=>'categoria_id']) !!}
                </div>
                <div class="form-group col-sm-2">
                        <br>
                        <a href="{{ asset('/pedido/detalle') }}" class="btn btn-warning btn-update-item col-sm-6">Pedido <i class="fa fa-shopping-cart"></i></a>
                </div>
                <div id="contenedor_producto" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/categorias_pedido.js') }}"></script>
@endsection
