<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id') !!}
    <p>{!! $sucursal->id !!}</p>
</div>

<!-- Nombre Sucursal Field -->
<div class="form-group">
    {!! Form::label('nombre_sucursal', 'Nombre') !!}
    <p>{!! $sucursal->nombre_sucursal !!}</p>
</div>

<!-- Direccion Sucursal Field -->
<div class="form-group">
    {!! Form::label('direccion_sucursal', 'Direccion') !!}
    <p>{!! $sucursal->direccion_sucursal !!}</p>
</div>

<!-- Telefono Sucursal Field -->
<div class="form-group">
    {!! Form::label('telefono_sucursal', 'Telefono') !!}
    <p>{!! $sucursal->telefono_sucursal !!}</p>
</div>

<!-- Empresa Id Field -->
<div class="form-group">
    {!! Form::label('empresa_id', 'Empresa') !!}
    <p>{!! $sucursal->empresa_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created') !!}
    <p>{!! $sucursal->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated') !!}
    <p>{!! $sucursal->updated_at !!}</p>
</div>

