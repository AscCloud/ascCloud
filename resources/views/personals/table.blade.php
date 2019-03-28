<table class="table table-responsive" id="personals-table">
    <thead>
        <tr>
            <th>Ruc</th>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Email</th>
        <th>Img</th>
        <th>Fecha de Nacimiento</th>
        <th>Sucursal</th>
            <th colspan="3"></th>
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
            <td>{!! \Carbon\Carbon::parse($personal->nacimiento_personal)->format('Y-m-d')!!}</td>//Formato de fecha Año, mes y día
            <td>{!! $personal->sucursal->nombre_sucursal !!}</td>
            <td>
                {!! Form::open(['route' => ['personals.destroy', $personal->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('personals.show', [$personal->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('personals.edit', [$personal->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Desea eliminar?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
