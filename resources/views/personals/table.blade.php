<table class="table table-responsive" id="personals-table">
    <thead>
        <tr>
            <th>Ruc Personal</th>
        <th>Nombre Personal</th>
        <th>Telefono Personal</th>
        <th>Email Personal</th>
        <th>Img Personal</th>
        <th>Nacimiento Personal</th>
        <th>Sucursal Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($personals as $personal)
        <tr>
            <td>{!! $personal->ruc_personal !!}</td>
            <td>{!! $personal->nombre_personal !!}</td>
            <td>{!! $personal->telefono_personal !!}</td>
            <td>{!! $personal->email_personal !!}</td>
            <td>{!! $personal->img_personal !!}</td>
            <td>{!! $personal->nacimiento_personal !!}</td>
            <td>{!! $personal->sucursal->nombre_sucursal !!}</td>
            <td>
                {!! Form::open(['route' => ['personals.destroy', $personal->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('personals.show', [$personal->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('personals.edit', [$personal->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
