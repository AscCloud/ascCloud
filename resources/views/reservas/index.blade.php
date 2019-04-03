@extends('layouts.app')
@section('css')
    {!! Html::style('css/mesas.css') !!}
@endsection
@section('content')
<div class="content">
    <div class="box box-primary">
        <div class="box-body">
            <div class="form-group col-sm-12">
                {!! Form::hidden('token', csrf_token(),['id'=>'token']) !!}
                {!! Form::label('planta_id', 'Planta') !!}
                {!! Form::select('planta_id', $plant, null, ['class' => 'form-control','id'=>'planta_id']) !!}
            </div>
            <div id='contenedor_mesa' class="col-sm-12">

            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/plantas.js') }}"></script>
@endsection
