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
                @foreach ($productos as $producto)

                    <div class="col-md-2">
                        <div class="form-group col-sm-12">
                            <img id='imagen_producto' src="{{ Storage::url($producto->img_producto) }}"/>
                            <div class="btn btn-success"><a href="#"><span style="color:white" class="glyphicon glyphicon-plus"</span></a></div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
</div>
@endsection
