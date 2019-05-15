@section('css')
    <link rel="stylesheet" href="{{ asset('css/popup.css') }}" />
@endsection
<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsive">
    <thead>
        <tr>
            <th>Numero</th>
        <th>Planta</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($mesas as $mesa)
        <tr>
            <td>{!! $mesa->numero_mesa !!}</td>
            <td>{!! $mesa->planta->nombre_planta !!}</td>
            <td>
                {!! Form::open(['route' => ['mesas.destroy', $mesa->id], 'method' => 'delete']) !!}
                <a href=""{!! route('mesas.show', [$mesa->id]) !!}"" style="background-color:#000 !important; border-color:#000 !important;" data-toggle="modal" data-target="#mostrar" class="btn btn-warning btn-update-item"><i class="fa fa-eye"></i></a>
                <a href="{!! route('mesas.edit', [$mesa->id]) !!}" class="btn btn-warning btn-update-item"><i class="fa fa-edit"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-delete-item', 'onclick' => "return confirm('¿Desea eliminar?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@foreach($mesas as $mesa)
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

                <!-- Numero Field -->
                <div class="form-group">
                    {!! Form::label('numero', 'Número') !!}
                    <p>{!! $mesa->numero_mesa !!}</p>
                </div>

                <!-- Planta Id Field -->
                <div class="form-group">
                    {!! Form::label('planta_id', 'Planta') !!}
                    <p>{!! $mesa->planta->nombre_planta !!}</p>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{!! route('mesas.index') !!}" class="btn btn-danger" data-dismiss="modal">Regresar</a>
            </div>
        </div>
    </div>
</div>
@endforeach
