<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsive">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Sucursal</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categorias as $categoria)
        <tr>
            <td>{!! $categoria->nombre_categoria !!}</td>
            <td>{!! $categoria->sucursal->nombre_sucursal !!}</td>
            <td >
                {!! Form::open(['route' => ['categorias.destroy', $categoria->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="#" class='btn btn-default btn-xs' data-toggle="modal" data-target="#mostrar"><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('categorias.edit', [$categoria->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
            </div>
            <div class="modal-footer">
                <a href="{!! route('categorias.index') !!}" class="btn btn-default" data-dismiss="modal">Regresar</a>
            </div>
        </div>
    </div>
</div>

<!--Pop up para mostrar la información -->
<div class="modal fade" id="up">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                <h4>Crear</h4>
            </div>
             <div class="modal-body">
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
            </div>
            <div class="modal-footer">
                <a href="{!! route('categorias.index') !!}" class="btn btn-default" data-dismiss="modal">Regresar</a>
            </div>
        </div>
    </div>
</div>
