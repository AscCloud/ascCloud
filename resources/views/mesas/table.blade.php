<table class="table table-responsive" id="mesas-table">
    <thead>
        <tr>
            <th>Numero</th>
        <th>Planta Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($mesas as $mesa)
        <tr>
            <td>{!! $mesa->numero_mesa !!}</td>
            <td>{!! $mesa->planta->nombre_planta !!}</td>
            <td>
                {!! Form::open(['route' => ['mesas.destroy', $mesa->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('mesas.show', [$mesa->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('mesas.edit', [$mesa->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
