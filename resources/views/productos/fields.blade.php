<!-- Nombre Producto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_producto', 'Nombre') !!}
    {!! Form::text('nombre_producto', null, ['class' => 'form-control']) !!}
</div>

<!-- Precio Producto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precio_producto', 'Precio') !!}
    {!! Form::text('precio_producto', null, ['class' => 'form-control']) !!}
</div>

<!-- Img Producto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('img_producto', 'Img') !!}
    {!! Form::text('img_producto', null, ['class' => 'form-control']) !!}
</div>

<!-- Iva Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('iva_id', 'Iva') !!}
    {!! Form::select('iva_id', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Sucursal Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sucursal_id', 'Sucursal') !!}
    {!! Form::select('sucursal_id', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Categoria Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_id', 'Categoria') !!}
    {!! Form::select('categoria_id', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('productos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
