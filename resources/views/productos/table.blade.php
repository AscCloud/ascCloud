<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsive">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Precio</th>
        <th>Img</th>
        <th>Iva</th>
        <th>Sucursal</th>
        <th>Categoria</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($productos as $producto)
        <tr>
            <td>{!! $producto->nombre_producto !!}</td>
            <td>{!! $producto->precio_producto !!}</td>
            <td>{!! $producto->img_producto !!}</td>
            <td>{!! $producto->iva->iva !!}</td>
            <td>{!! $producto->sucursal->nombre_sucursal !!}</td>
            <td>{!! $producto->categoria->nombre_categoria !!}</td>
            <td>
                {!! Form::open(['route' => ['productos.destroy', $producto->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="#" class='btn btn-default btn-xs' data-toggle="modal" data-target="#mostrar"><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('productos.edit', [$producto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Desea eliminar?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<!--Pop up para mostrar la información -->
<div class="modal fade" id="mostrar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                <h4>Crear</h4>
            </div>
             <div class="modal-body">
                    <!-- Nombre Producto Field -->
                    <div class="form-group">
                        {!! Form::label('nombre_producto', 'Nombre') !!}
                        <p>{!! $producto->nombre_producto !!}</p>
                    </div>

                    <!-- Precio Producto Field -->
                    <div class="form-group">
                        {!! Form::label('precio_producto', 'Precio') !!}
                        <p>{!! $producto->precio_producto !!}</p>
                    </div>

                    <!-- Img Producto Field -->
                    <div class="form-group">
                        {!! Form::label('img_producto', 'Img') !!}
                        <p>{!! $producto->img_producto !!}</p>
                    </div>

                    <!-- Iva Id Field -->
                    <div class="form-group">
                        {!! Form::label('iva_id', 'Iva') !!}
                        <p>{!! $producto->iva_id !!}</p>
                    </div>

                    <!-- Sucursal Id Field -->
                    <div class="form-group">
                        {!! Form::label('sucursal_id', 'Sucursal') !!}
                        <p>{!! $producto->sucursal_id !!}</p>
                    </div>

                    <!-- Categoria Id Field -->
                    <div class="form-group">
                        {!! Form::label('categoria_id', 'Categoria') !!}
                        <p>{!! $producto->categoria_id !!}</p>
                    </div>
            </div>
            <div class="modal-footer">
                <a href="{!! route('productos.index') !!}" class="btn btn-default" data-dismiss="modal">Regresar</a>
            </div>
        </div>
    </div>
</div>
