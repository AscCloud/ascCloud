<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id') !!}
    <p>{!! $categoria->id !!}</p>
</div>

<!-- Nombre Categoria Field -->
<div class="form-group">
    {!! Form::label('nombre_categoria', 'Nombre') !!}
    <p>{!! $categoria->nombre_categoria !!}</p>
</div>

<!-- Sucursal Id Field -->
<div class="form-group">
    {!! Form::label('sucursal_id', 'Sucursal') !!}
    <p>{!! $categoria->sucursal_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At') !!}
    <p>{!! $categoria->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At') !!}
    <p>{!! $categoria->updated_at !!}</p>
</div>

