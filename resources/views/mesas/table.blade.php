<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsive">
    <thead>
        <tr>
            <th>Numero</th>
        <th>Planta</th>
            <th></th>
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

<!--Pop up para mostrar la información -->
<div class="modal fade" id="mostrar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                <h4></h4>
            </div>
             <div class="modal-body">

                <!-- Numero Field -->
                <div class="form-group">
                    {!! Form::label('numero', 'Numero') !!}
                    <p>{!! $mesa->numero_mesa !!}</p>
                </div>

                <!-- Planta Id Field -->
                <div class="form-group">
                    {!! Form::label('planta_id', 'Planta') !!}
                    <p>{!! $mesa->planta->nombre_planta !!}</p>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{!! route('mesas.index') !!}" class="btn btn-default" data-dismiss="modal">Regresar</a>
            </div>
        </div>
    </div>
</div>
