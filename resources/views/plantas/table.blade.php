@section('css')
    <link rel="stylesheet" href="{{ asset('css/popup.css') }}" />
@endsection
<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsive">
    <thead>
        <tr>
        <th>Nombre</th>
        <th>Descuento</th>
        <th>Sucursal</th>
        <th></th>
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
                    <a href="#" class='btn btn-default btn-xs' data-toggle="modal" data-target="#mostrar"><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('plantas.edit', [$planta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
                            <i class="glyphicon glyphicon-remove-circle"></i>
                        </button>
                        <label style="font-size: 30px">Información</label>
                    </div>
             <div class="modal-body">

                <!-- Nombre Planta Field -->
                <div class="form-group">
                    {!! Form::label('nombre_planta', 'Nombre') !!}
                    <p>{!! $planta->nombre_planta !!}</p>
                </div>

                <!-- Descuento Planta Field -->
                <div class="form-group">
                    {!! Form::label('descuento_planta', 'Descuento') !!}
                    <p>{!! $planta->descuento_planta !!}</p>
                </div>

                <!-- Sucursal Id Field -->
                <div class="form-group">
                    {!! Form::label('sucursal_id', 'Sucursal') !!}
                    <p>{!! $planta->sucursal->nombre_sucursal !!}</p>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{!! route('plantas.index') !!}" class="btn btn-danger" data-dismiss="modal">Regresar</a>
            </div>
        </div>
    </div>
</div>
