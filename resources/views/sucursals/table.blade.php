@section('css')
    <link rel="stylesheet" href="{{ asset('css/popup.css') }}" />
@endsection
<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsive">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Empresa</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($sucursals as $sucursal)
        <tr>
            <td>{!! $sucursal->nombre_sucursal !!}</td>
            <td>{!! $sucursal->direccion_sucursal !!}</td>
            <td>{!! $sucursal->telefono_sucursal !!}</td>
            <td>{!! $sucursal->empresa->nombre_empresa !!}</td>
            <td>
                {!! Form::open(['route' => ['sucursals.destroy', $sucursal->id], 'method' => 'delete']) !!}
                <a href="#" style="background-color:#000 !important; border-color:#000 !important;" data-toggle="modal" data-target="#mostrar" class="btn btn-warning btn-update-item"><i class="fa fa-eye"></i></a>
                <a href="{!! route('sucursals.edit', [$sucursal->id]) !!}" class="btn btn-warning btn-update-item"><i class="fa fa-edit"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-delete-item', 'onclick' => "return confirm('¿Desea eliminar?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@foreach($sucursals as $sucursal)
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
                <!-- Nombre Sucursal Field -->
                <div class="form-group">
                    {!! Form::label('nombre_sucursal', 'Nombre') !!}
                    <p>{!! $sucursal->nombre_sucursal !!}</p>
                </div>

                <!-- Direccion Sucursal Field -->
                <div class="form-group">
                    {!! Form::label('direccion_sucursal', 'Dirección') !!}
                    <p>{!! $sucursal->direccion_sucursal !!}</p>
                </div>

                <!-- Telefono Sucursal Field -->
                <div class="form-group">
                    {!! Form::label('telefono_sucursal', 'Teléfono') !!}
                    <p>{!! $sucursal->telefono_sucursal !!}</p>
                </div>

                <!-- Empresa Id Field -->
                <div class="form-group">
                    {!! Form::label('empresa_id', 'Empresa') !!}
                    <p>{!! $sucursal->empresa->nombre_empresa !!}</p>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{!! route('sucursals.index') !!}" class="btn btn-danger" data-dismiss="modal">Regresar</a>
            </div>
        </div>
    </div>
</div>
@endforeach
