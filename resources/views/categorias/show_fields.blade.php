<!-- Nombre Categoria Field -->
<div class="form-group">
    {!! Form::label('nombre_categoria', 'Nombre') !!}
    <p>{!! $categoria->nombre_categoria !!}</p>
</div>

<!-- Sucursal Id Field -->
<div class="form-group">
    {!! Form::label('sucursal_id', 'Sucursal') !!}
    <p>{!! $categoria->sucursal->nombre_sucursal !!}</p>
</div>


