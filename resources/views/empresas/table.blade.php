<table class="table table-responsive" id="empresas-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th colspan="3"></th>
        </tr>
    </thead>
    <tbody>
    @foreach($empresas as $empresa)
        <tr>
            <td>{!! $empresa->nombre_empresa !!}</td>
            <td>
                {!! Form::open(['route' => ['empresas.destroy', $empresa->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="#" class='btn btn-default btn-xs' data-toggle="modal" data-target="#mostrar"><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('empresas.edit', [$empresa->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Desea Eliminar?')"]) !!}
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
                    <!-- Nombre Empresa Field -->
                    <div class="form-group">
                        {!! Form::label('nombre_empresa', 'Nombre') !!}
                        <p>{!! $empresa->nombre_empresa !!}</p>
                    </div>
            </div>
            <div class="modal-footer">
                <a href="{!! route('empresas.index') !!}" class="btn btn-default" data-dismiss="modal">Regresar</a>
            </div>
        </div>
    </div>
</div>
