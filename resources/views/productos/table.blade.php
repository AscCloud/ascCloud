<table class="table table-responsive" id="productos-table">
    <thead>
        <tr>
            <th>Nombre Producto</th>
        <th>Precio Producto</th>
        <th>Img Producto</th>
        <th>Sucursal Id</th>
        <th>Categoria Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($productos as $productos)
        <tr>
            <td>{!! $productos->nombre_producto !!}</td>
            <td>{!! $productos->precio_producto !!}</td>
            <td>{!! $productos->img_producto !!}</td>
            <td>{!! $productos->sucursal_id !!}</td>
            <td>{!! $productos->categoria_id !!}</td>
            <td>
                {!! Form::open(['route' => ['productos.destroy', $productos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('productos.show', [$productos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('productos.edit', [$productos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>