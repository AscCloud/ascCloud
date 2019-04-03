<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $planta->id !!}</p>
</div>

<!-- Nombre Planta Field -->
<div class="form-group">
    {!! Form::label('nombre_planta', 'Nombre Planta:') !!}
    <p>{!! $planta->nombre_planta !!}</p>
</div>

<!-- Descuento Planta Field -->
<div class="form-group">
    {!! Form::label('descuento_planta', 'Descuento Planta:') !!}
    <p>{!! $planta->descuento_planta !!}</p>
</div>

<!-- Sucursal Id Field -->
<div class="form-group">
    {!! Form::label('sucursal_id', 'Sucursal Id:') !!}
    <p>{!! $planta->sucursal_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $planta->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $planta->updated_at !!}</p>
</div>

