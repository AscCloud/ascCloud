<!-- Nombre Empresa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_empresa', 'Nombre') !!}
    {!! Form::text('nombre_empresa', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('empresas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
