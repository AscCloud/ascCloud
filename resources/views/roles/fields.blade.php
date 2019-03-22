<!-- Nombre Rol Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_rol', 'Nombre Rol:') !!}
    {!! Form::text('nombre_rol', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('roles.index') !!}" class="btn btn-default">Cancel</a>
</div>
