<table class="table table-responsive" id="sucursals-table">
    <thead>
        <tr>
            <th>Nombre Sucursal</th>
        <th>Direccion Sucursal</th>
        <th>Telefono Sucursal</th>
        <th>Empresa Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($sucursals as $sucursal)
        <tr>
            <td>{!! $sucursal->nombre_sucursal !!}</td>
            <td>{!! $sucursal->direccion_sucursal !!}</td>
            <td>{!! $sucursal->telefono_sucursal !!}</td>
            <td>{!! $sucursal->empresa_id !!}</td>
            <td>
                {!! Form::open(['route' => ['sucursals.destroy', $sucursal->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('sucursals.show', [$sucursal->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('sucursals.edit', [$sucursal->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>