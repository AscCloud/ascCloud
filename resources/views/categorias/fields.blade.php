<!-- Nombre Categoria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_categoria', 'Nombre Categoria:') !!}
    {!! Form::text('nombre_categoria', null, ['class' => 'form-control']) !!}
</div>

<!-- Sucursal Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sucursal_id', 'Sucursal Id:') !!}
    {!! Form::select('sucursal_id',$papel,null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('categorias.index') !!}" class="btn btn-default">Cancel</a>
</div>
