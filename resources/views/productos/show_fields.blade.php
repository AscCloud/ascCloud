<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $productos->id !!}</p>
</div>

<!-- Nombre Producto Field -->
<div class="form-group">
    {!! Form::label('nombre_producto', 'Nombre Producto:') !!}
    <p>{!! $productos->nombre_producto !!}</p>
</div>

<!-- Precio Producto Field -->
<div class="form-group">
    {!! Form::label('precio_producto', 'Precio Producto:') !!}
    <p>{!! $productos->precio_producto !!}</p>
</div>

<!-- Img Producto Field -->
<div class="form-group">
    {!! Form::label('img_producto', 'Img Producto:') !!}
    <p>{!! $productos->img_producto !!}</p>
</div>

<!-- Sucursal Id Field -->
<div class="form-group">
    {!! Form::label('sucursal_id', 'Sucursal Id:') !!}
    <p>{!! $productos->sucursal_id !!}</p>
</div>

<!-- Categoria Id Field -->
<div class="form-group">
    {!! Form::label('categoria_id', 'Categoria Id:') !!}
    <p>{!! $productos->categoria_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $productos->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $productos->updated_at !!}</p>
</div>

