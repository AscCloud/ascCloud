<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $sucursal->id !!}</p>
</div>

<!-- Nombre Sucursal Field -->
<div class="form-group">
    {!! Form::label('nombre_sucursal', 'Nombre Sucursal:') !!}
    <p>{!! $sucursal->nombre_sucursal !!}</p>
</div>

<!-- Direccion Sucursal Field -->
<div class="form-group">
    {!! Form::label('direccion_sucursal', 'Direccion Sucursal:') !!}
    <p>{!! $sucursal->direccion_sucursal !!}</p>
</div>

<!-- Telefono Sucursal Field -->
<div class="form-group">
    {!! Form::label('telefono_sucursal', 'Telefono Sucursal:') !!}
    <p>{!! $sucursal->telefono_sucursal !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $sucursal->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $sucursal->updated_at !!}</p>
</div>

