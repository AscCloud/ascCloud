<!-- Nombre Sucursal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_sucursal', 'Nombre Sucursal:') !!}
    {!! Form::text('nombre_sucursal', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Sucursal Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('direccion_sucursal', 'Direccion Sucursal:') !!}
    {!! Form::textarea('direccion_sucursal', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Sucursal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono_sucursal', 'Telefono Sucursal:') !!}
    {!! Form::text('telefono_sucursal', null, ['class' => 'form-control']) !!}
</div>

<!-- Empresa Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('empresa_id', 'Empresa Id:') !!}
    {!! Form::select('empresa_id', $emp, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('sucursals.index') !!}" class="btn btn-default">Cancel</a>
</div>
