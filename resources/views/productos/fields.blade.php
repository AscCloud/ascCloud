<!-- Nombre Producto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_producto', 'Nombre Producto:') !!}
    {!! Form::text('nombre_producto', null, ['class' => 'form-control']) !!}
</div>

<!-- Precio Producto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precio_producto', 'Precio Producto:') !!}
    {!! Form::text('precio_producto', null, ['class' => 'form-control']) !!}
</div>

<!-- Img Producto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('img_producto', 'Img Producto:') !!}
    {!! Form::text('img_producto', null, ['class' => 'form-control']) !!}
</div>

<!-- Iva Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('iva_id', 'Iva Id:') !!}
    {!! Form::select('iva_id', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Sucursal Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sucursal_id', 'Sucursal Id:') !!}
    {!! Form::select('sucursal_id', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Categoria Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_id', 'Categoria Id:') !!}
    {!! Form::select('categoria_id', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('productos.index') !!}" class="btn btn-default">Cancel</a>
</div>
