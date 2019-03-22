<table class="table table-responsive" id="clientes-table">
    <thead>
        <tr>
            <th>Nombre Cliente</th>
        <th>Apellido Cliente</th>
        <th>Ruc Cliente</th>
        <th>Telefono Cliente</th>
        <th>Email Cliente</th>
        <th>Direccion Cliente</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clientes as $cliente)
        <tr>
            <td>{!! $cliente->nombre_cliente !!}</td>
            <td>{!! $cliente->apellido_cliente !!}</td>
            <td>{!! $cliente->ruc_cliente !!}</td>
            <td>{!! $cliente->telefono_cliente !!}</td>
            <td>{!! $cliente->email_cliente !!}</td>
            <td>{!! $cliente->direccion_cliente !!}</td>
            <td>
                {!! Form::open(['route' => ['clientes.destroy', $cliente->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('clientes.show', [$cliente->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('clientes.edit', [$cliente->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>