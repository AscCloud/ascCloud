<table class="table table-responsive" id="productos-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Precio</th>
        <th>Img</th>
        <th>Iva</th>
        <th>Sucursal</th>
        <th>Categoria</th>
            <th colspan="3"></th>
        </tr>
    </thead>
    <tbody>
    @foreach($productos as $producto)
        <tr>
            <td>{!! $producto->nombre_producto !!}</td>
            <td>{!! $producto->precio_producto !!}</td>
            <td>{!! $producto->img_producto !!}</td>
            <td>{!! $producto->iva_id !!}</td>
            <td>{!! $producto->sucursal_id !!}</td>
            <td>{!! $producto->categoria_id !!}</td>
            <td>
                {!! Form::open(['route' => ['productos.destroy', $producto->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('productos.show', [$producto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('productos.edit', [$producto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Desea eliminar?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
