@section('css')
    <link rel="stylesheet" href="{{ asset('css/popup.css') }}" />
@endsection
<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsive">
    <thead>
        <tr>
            <th>Iva</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($ivas as $iva)
        <tr>
            <td>{!! $iva->iva !!}</td>
            <td>
                {!! Form::open(['route' => ['ivas.destroy', $iva->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="#" class='btn btn-default btn-xs' data-toggle="modal" data-target="#mostrar"><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('ivas.edit', [$iva->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
                            <i class="glyphicon glyphicon-remove-circle"></i>
                        </button>
                        <label style="font-size: 30px">Información</label>
                    </div>
             <div class="modal-body">
                    <!-- Iva Field -->
                    <div class="form-group">
                        {!! Form::label('iva', 'Iva') !!}
                        <p>{!! $iva->iva !!}</p>
                    </div>
            </div>
            <div class="modal-footer">
                <a href="{!! route('ivas.index') !!}" class="btn btn-danger" data-dismiss="modal">Regresar</a>
            </div>
        </div>
    </div>
</div>
