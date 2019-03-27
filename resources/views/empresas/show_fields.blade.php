<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id') !!}
    <p>{!! $empresa->id !!}</p>
</div>

<!-- Nombre Empresa Field -->
<div class="form-group">
    {!! Form::label('nombre_empresa', 'Nombre') !!}
    <p>{!! $empresa->nombre_empresa !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At') !!}
    <p>{!! $empresa->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At') !!}
    <p>{!! $empresa->updated_at !!}</p>
</div>

