@section('css')
    <link rel="stylesheet" href="{{ asset('css/popup.css') }}" />
@endsection
<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsive">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Precio</th>
        <th>Iva</th>
        <th>Sucursal</th>
        <th>Categoria</th>
        <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($productos as $producto)
        <tr>
            <td>{!! $producto->nombre_producto !!}</td>
            <td>{!! $producto->precio_producto !!}</td>
            <td>{!! $producto->iva->iva !!}</td>
            <td>{!! $producto->sucursal->nombre_sucursal !!}</td>
            <td>{!! $producto->categoria->nombre_categoria !!}</td>
            <td>
                {!! Form::open(['route' => ['productos.destroy', $producto->id], 'method' => 'delete']) !!}
                <a href="#" style="background-color:#000 !important; border-color:#000 !important;" data-toggle="modal" data-target="#mostrar" class="btn btn-warning btn-update-item"><i class="fa fa-eye"></i></a>
                <a href="{!! route('productos.edit', [$producto->id]) !!}" class="btn btn-warning btn-update-item"><i class="fa fa-edit"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-delete-item', 'onclick' => "return confirm('¿Desea eliminar?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@foreach($productos as $producto)
<!--Pop up para mostrar la información -->
<div class="modal fade" id="mostrar">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="glyphicon glyphicon-remove-circle"></i>
                        </button>
                        <label style="font-size: 30px">Información</label>
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

                    <!-- Iva Id Field -->
                    <div class="form-group">
                        {!! Form::label('iva_id', 'Iva') !!}
                        <p>{!! $producto->iva->iva !!}</p>
                    </div>

                    <!-- Sucursal Id Field -->
                    <div class="form-group">
                        {!! Form::label('sucursal_id', 'Sucursal') !!}
                        <p>{!! $producto->sucursal->nombre_sucursal!!}</p>
                    </div>

                    <!-- Categoria Id Field -->
                    <div class="form-group">
                        {!! Form::label('categoria_id', 'Categoria') !!}
                        <p>{!! $producto->categoria->nombre_categoria !!}</p>
                    </div>
            </div>
            <div class="modal-footer">
                <a href="{!! route('productos.index') !!}" class="btn btn-danger" data-dismiss="modal">Regresar</a>
            </div>
        </div>
    </div>
</div>
@endforeach
