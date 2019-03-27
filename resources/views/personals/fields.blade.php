<!-- Ruc Personal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ruc_personal', 'Ruc') !!}
    {!! Form::text('ruc_personal', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Personal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_personal', 'Nombre') !!}
    {!! Form::text('nombre_personal', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Personal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono_personal', 'Telefono') !!}
    {!! Form::text('telefono_personal', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Personal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email_personal', 'Email') !!}
    {!! Form::email('email_personal', null, ['class' => 'form-control']) !!}
</div>

<!-- Img Personal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('img_personal', 'Img') !!}
    {!! Form::text('img_personal', null, ['class' => 'form-control']) !!}
</div>

<!-- Nacimiento Personal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nacimiento_personal', 'Fecha de Nacimiento') !!}
    {!! Form::text('nacimiento_personal', null, ['class' => 'form-control','id'=>'nacimiento_personal']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#nacimiento_personal').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false
        })
    </script>
@endsection

<!-- Sucursal Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sucursal_id', 'Sucursal') !!}
    {!! Form::select('sucursal_id', $suc, null, ['class' => 'form-control']) !!}
</div>

<!-- Username user Field -->
<div class="form-group col-sm-6">
    {!! Form::label('username', 'Username') !!}
    {!! Form::text('username', null, ['class' => 'form-control']) !!}
</div>
<!-- Password user Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', null, ['class' => 'form-control']) !!}
</div>
<!-- Rol Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rol_id', 'Rol') !!}
    {!! Form::select('rol_id', $r, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('personals.index') !!}" class="btn btn-default">Cancelar</a>
</div>

