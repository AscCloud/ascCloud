<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsive">
    <thead>
        <tr>
            <th>Nombre Planta</th>
        <th>Descuento Planta</th>
        <th>Sucursal Id</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($plantas as $planta)
        <tr>
            <td>{!! $planta->nombre_planta !!}</td>
            <td>{!! $planta->descuento_planta !!}</td>
            <td>{!! $planta->sucursal->nombre_sucursal !!}</td>
            <td>
                {!! Form::open(['route' => ['plantas.destroy', $planta->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('plantas.show', [$planta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('plantas.edit', [$planta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
