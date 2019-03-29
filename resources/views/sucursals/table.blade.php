<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsive">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Empresa</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($sucursals as $sucursal)
        <tr>
            <td>{!! $sucursal->nombre_sucursal !!}</td>
            <td>{!! $sucursal->direccion_sucursal !!}</td>
            <td>{!! $sucursal->telefono_sucursal !!}</td>
            <td>{!! $sucursal->empresa->nombre_empresa !!}</td>
            <td>
                {!! Form::open(['route' => ['sucursals.destroy', $sucursal->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="#" class='btn btn-default btn-xs' data-toggle="modal" data-target="#mostrar"><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('sucursals.edit', [$sucursal->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
                <!-- Nombre Sucursal Field -->
                <div class="form-group">
                    {!! Form::label('nombre_sucursal', 'Nombre') !!}
                    <p>{!! $sucursal->nombre_sucursal !!}</p>
                </div>

                <!-- Direccion Sucursal Field -->
                <div class="form-group">
                    {!! Form::label('direccion_sucursal', 'Direccion') !!}
                    <p>{!! $sucursal->direccion_sucursal !!}</p>
                </div>

                <!-- Telefono Sucursal Field -->
                <div class="form-group">
                    {!! Form::label('telefono_sucursal', 'Telefono') !!}
                    <p>{!! $sucursal->telefono_sucursal !!}</p>
                </div>

                <!-- Empresa Id Field -->
                <div class="form-group">
                    {!! Form::label('empresa_id', 'Empresa') !!}
                    <p>{!! $sucursal->empresa->nombre_empresa !!}</p>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{!! route('sucursals.index') !!}" class="btn btn-default" data-dismiss="modal">Regresar</a>
            </div>
        </div>
    </div>
</div>
