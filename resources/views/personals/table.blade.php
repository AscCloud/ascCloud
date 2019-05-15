@section('css')
    <link rel="stylesheet" href="{{ asset('css/popup.css') }}" />
@endsection
<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsive">
    <thead>
        <tr>
        <th>Identificación Tributaria</th>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Email</th>
        <th>Fecha de Nacimiento</th>
        <th>Sucursal</th>
        <th></th>
        </tr>
    </thead>
    <tbody id="#detalle-table tbody">
    @foreach($personals as $personal)
        <tr>
            <td>{!! $personal->ruc_personal !!}</td>
            <td>{!! $personal->nombre_personal !!}</td>
            <td>{!! $personal->telefono_personal !!}</td>
            <td>{!! $personal->email_personal !!}</td>
            <td>{!! \Carbon\Carbon::parse($personal->nacimiento_personal)->format('Y-m-d')!!}</td><!--Formato de fecha Año, mes y día-->
            <td>{!! $personal->sucursal->nombre_sucursal !!}</td>
            <td>
                {!! Form::open(['route' => ['personals.destroy', $personal->id], 'method' => 'delete']) !!}
                <a href="#" style="background-color:#000 !important; border-color:#000 !important;" data-toggle="modal" data-target="#mostrar" class="btn btn-warning btn-update-item"><i class="fa fa-eye"></i></a>
                <a href="{!! route('personals.edit', [$personal->id]) !!}" class="btn btn-warning btn-update-item"><i class="fa fa-edit"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-delete-item', 'onclick' => "return confirm('¿Desea eliminar?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@foreach($personals as $personal)
<!--Pop up para mostrar la información -->

<div class="modal fade" id="mostrar" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="glyphicon glyphicon-remove-circle"></i>
                    </button>
                    <label style="font-size: 30px">Información</label>
             </div>
             <div class="modal-body">
                    <!-- Ruc Personal Field -->
                    <div class="form-group">
                        {!! Form::label('ruc_personal', 'Identificación Tributaria') !!}
                        <p>{!! $personal->ruc_personal !!}</p>
                    </div>

                    <!-- Nombre Personal Field -->
                    <div class="form-group">
                        {!! Form::label('nombre_personal', 'Nombre') !!}
                        <p>{!! $personal->nombre_personal !!}</p>
                    </div>

                    <!-- Telefono Personal Field -->
                    <div class="form-group">
                        {!! Form::label('telefono_personal', 'Teléfono') !!}
                        <p>{!! $personal->telefono_personal !!}</p>
                    </div>

                    <!-- Email Personal Field -->
                    <div class="form-group">
                        {!! Form::label('email_personal', 'Email') !!}
                        <p>{!! $personal->email_personal !!}</p>
                    </div>

                    <!-- Nacimiento Personal Field -->
                    <div class="form-group">
                        {!! Form::label('nacimiento_personal', 'Fecha de Nacimiento') !!}
                        <p>{!! \Carbon\Carbon::parse($personal->nacimiento_personal)->format('Y-m-d') !!}</p>
                    </div>

                    <!-- Sucursal Id Field -->
                    <div class="form-group">
                        {!! Form::label('sucursal_id', 'Sucursal') !!}
                        <p>{!! $personal->sucursal->nombre_sucursal !!}</p>
                    </div>
            </div>
            <div class="modal-footer">
                <a href="{!! route('personals.index') !!}" class="btn btn-danger" data-dismiss="modal">Regresar</a>
            </div>
        </div>
    </div>
</div>
@endforeach


