<table class="table table-responsive" id="ivas-table">
    <thead>
        <tr>
            <th>Iva</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($ivas as $iva)
        <tr>
            <td>{!! $iva->iva !!}</td>
            <td>
                {!! Form::open(['route' => ['ivas.destroy', $iva->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('ivas.show', [$iva->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('ivas.edit', [$iva->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>