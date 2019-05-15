@section('css')
    <link rel="stylesheet" href="{{ asset('css/popup.css') }}" />
@endsection
<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsive">
    <thead>
        <tr>
        <th>Ruc Cliente</th>
        <th>Nombre Cliente</th>
        <th>Telefono Cliente</th>
        <th>Email Cliente</th>
        <th>Nacimiento Cliente</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clientes as $cliente)
        <tr>
            <td>{!! $cliente->ruc_cliente !!}</td>
            <td>{!! $cliente->nombre_cliente !!}</td>
            <td>{!! $cliente->telefono_cliente !!}</td>
            <td>{!! $cliente->email_cliente !!}</td>
            <td>{!! $cliente->nacimiento_cliente !!}</td>
            <td>
                {!! Form::open(['route' => ['clientes.destroy', $cliente->id], 'method' => 'delete']) !!}
                <a href=""{!! route('clientes.show', [$cliente->id]) !!}"" style="background-color:#000 !important; border-color:#000 !important;" data-toggle="modal" data-target="#mostrar" class="btn btn-warning btn-update-item"><i class="fa fa-eye"></i></a>
                <a href="{!! route('clientes.edit', [$cliente->id]) !!}" class="btn btn-warning btn-update-item"><i class="fa fa-edit"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-delete-item', 'onclick' => "return confirm('¿Desea eliminar?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@foreach($clientes as $cliente)
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
                <!-- Ruc Cliente Field -->
                <div class="form-group">
                    {!! Form::label('ruc_cliente', 'Identificación Tributaria') !!}
                    <p>{!! $cliente->ruc_cliente !!}</p>
                </div>

                <!-- Nombre Cliente Field -->
                <div class="form-group">
                    {!! Form::label('nombre_cliente', 'Nombre') !!}
                    <p>{!! $cliente->nombre_cliente !!}</p>
                </div>

                <!-- Telefono Cliente Field -->
                <div class="form-group">
                    {!! Form::label('telefono_cliente', 'Telefono') !!}
                    <p>{!! $cliente->telefono_cliente !!}</p>
                </div>

                <!-- Email Cliente Field -->
                <div class="form-group">
                    {!! Form::label('email_cliente', 'Email') !!}
                    <p>{!! $cliente->email_cliente !!}</p>
                </div>

                <!-- Nacimiento Cliente Field -->
                <div class="form-group">
                    {!! Form::label('nacimiento_cliente', 'Fecha de Nacimiento') !!}
                    <p>{!! $cliente->nacimiento_cliente !!}</p>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{!! route('clientes.index') !!}" class="btn btn-danger" data-dismiss="modal">Regresar</a>
            </div>
        </div>
    </div>
</div>
@endforeach
