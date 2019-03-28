<table class="table table-responsive" id="personals-table">
    <thead>
        <tr>
        <th>Ruc</th>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Email</th>
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
            <td>{!! \Carbon\Carbon::parse($personal->nacimiento_personal)->format('Y-m-d')!!}</td><!--Formato de fecha Año, mes y día-->
            <td>{!! $personal->sucursal->nombre_sucursal !!}</td>
            <td>
                {!! Form::open(['route' => ['personals.destroy', $personal->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="#" class='btn btn-default btn-xs' data-toggle="modal" data-target="#mostrar"><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('personals.edit', [$personal->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
                    <span>×</span>
                </button>
                <h4>Crear</h4>
            </div>
             <div class="modal-body">
                    <!-- Ruc Personal Field -->
                    <div class="form-group">
                        {!! Form::label('ruc_personal', 'Ruc') !!}
                        <p>{!! $personal->ruc_personal !!}</p>
                    </div>

                    <!-- Nombre Personal Field -->
                    <div class="form-group">
                        {!! Form::label('nombre_personal', 'Nombre') !!}
                        <p>{!! $personal->nombre_personal !!}</p>
                    </div>

                    <!-- Telefono Personal Field -->
                    <div class="form-group">
                        {!! Form::label('telefono_personal', 'Telefono') !!}
                        <p>{!! $personal->telefono_personal !!}</p>
                    </div>

                    <!-- Email Personal Field -->
                    <div class="form-group">
                        {!! Form::label('email_personal', 'Email') !!}
                        <p>{!! $personal->email_personal !!}</p>
                    </div>

                    <!-- Img Personal Field -->
                    <div class="form-group">
                        {!! Form::label('img_personal', 'Img') !!}
                        <p>{!! $personal->img_personal !!}</p>
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
                <a href="{!! route('personals.index') !!}" class="btn btn-default" data-dismiss="modal">Regresar</a>
            </div>
        </div>
    </div>
</div>
