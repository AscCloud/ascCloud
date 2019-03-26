<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $producto->id !!}</p>
</div>

<!-- Nombre Producto Field -->
<div class="form-group">
    {!! Form::label('nombre_producto', 'Nombre Producto:') !!}
    <p>{!! $producto->nombre_producto !!}</p>
</div>

<!-- Precio Producto Field -->
<div class="form-group">
    {!! Form::label('precio_producto', 'Precio Producto:') !!}
    <p>{!! $producto->precio_producto !!}</p>
</div>

<!-- Img Producto Field -->
<div class="form-group">
    {!! Form::label('img_producto', 'Img Producto:') !!}
    <p>{!! $producto->img_producto !!}</p>
</div>

<!-- Iva Id Field -->
<div class="form-group">
    {!! Form::label('iva_id', 'Iva Id:') !!}
    <p>{!! $producto->iva_id !!}</p>
</div>

<!-- Sucursal Id Field -->
<div class="form-group">
    {!! Form::label('sucursal_id', 'Sucursal Id:') !!}
    <p>{!! $producto->sucursal_id !!}</p>
</div>

<!-- Categoria Id Field -->
<div class="form-group">
    {!! Form::label('categoria_id', 'Categoria Id:') !!}
    <p>{!! $producto->categoria_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $producto->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $producto->updated_at !!}</p>
</div>

