@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style_normalize.css') }}" />
@endsection
@section('content')
<div class="content">
    <div class="box box-primary">
        <div class="box-body">
                <div class="form-group col-sm-12">
                    {!! Form::hidden('token', csrf_token(),['id'=>'token']) !!}
                    {!! Form::label('categoria_id', 'Categoria') !!}
                    {!! Form::select('categoria_id', $cat, null, ['class' => 'form-control','id'=>'categoria_id']) !!}
                </div>
                <div id="contenedor_producto" class="col-lg-2 col-md-2 col-sm-6 col-xs-6">

                </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/categorias_pedido.js') }}"></script>
@endsection
