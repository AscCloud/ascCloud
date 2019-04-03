<!-- Numero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero_mesa', 'Numero') !!}
    {!! Form::text('numero_mesa', null, ['class' => 'form-control']) !!}
</div>

<!-- Planta Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('planta_id', 'Planta') !!}
    {!! Form::select('planta_id', $plant, null, ['class' => 'form-control']) !!}
</div>

<!-- Planta Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sucursal_id', 'Sucursal') !!}
    {!! Form::select('sucursal_id', $suc, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('mesas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
