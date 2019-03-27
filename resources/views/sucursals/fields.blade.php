<!-- Nombre Sucursal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_sucursal', 'Nombre') !!}
    {!! Form::text('nombre_sucursal', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Sucursal Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('direccion_sucursal', 'Direccion') !!}
    {!! Form::textarea('direccion_sucursal', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Sucursal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono_sucursal', 'Telefono') !!}
    {!! Form::text('telefono_sucursal', null, ['class' => 'form-control']) !!}
</div>

<!-- Empresa Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('empresa_id', 'Empresa') !!}
    {!! Form::select('empresa_id', $emp, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('sucursals.index') !!}" class="btn btn-default">Cancelar</a>
</div>
