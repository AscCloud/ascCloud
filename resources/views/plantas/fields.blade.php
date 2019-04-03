<!-- Nombre Planta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_planta', 'Nombre') !!}
    {!! Form::text('nombre_planta', null, ['class' => 'form-control']) !!}
</div>

<!-- Descuento Planta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descuento_planta', 'Descuento') !!}
    {!! Form::text('descuento_planta', null, ['class' => 'form-control']) !!}
</div>

<!-- Sucursal Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sucursal_id', 'Sucursal') !!}
    {!! Form::select('sucursal_id', $suc, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('plantas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
