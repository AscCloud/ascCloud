<!-- Ruc Personal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ruc_personal', 'Ruc Personal:') !!}
    {!! Form::text('ruc_personal', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Personal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_personal', 'Nombre Personal:') !!}
    {!! Form::text('nombre_personal', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Personal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono_personal', 'Telefono Personal:') !!}
    {!! Form::text('telefono_personal', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Personal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email_personal', 'Email Personal:') !!}
    {!! Form::email('email_personal', null, ['class' => 'form-control']) !!}
</div>

<!-- Img Personal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('img_personal', 'Img Personal:') !!}
    {!! Form::text('img_personal', null, ['class' => 'form-control']) !!}
</div>

<!-- Nacimiento Personal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nacimiento_personal', 'Nacimiento Personal:') !!}
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
    {!! Form::label('sucursal_id', 'Sucursal Id:') !!}
    {!! Form::select('sucursal_id', $suc, null, ['class' => 'form-control']) !!}
</div>

<!-- Username user Field -->
<div class="form-group col-sm-6">
    {!! Form::label('username', 'Username:') !!}
    {!! Form::text('username', null, ['class' => 'form-control']) !!}
</div>
<!-- Password user Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', null, ['class' => 'form-control']) !!}
</div>
<!-- Rol Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rol_id', 'Rol Id:') !!}
    {!! Form::select('rol_id', $r, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('personals.index') !!}" class="btn btn-default">Cancel</a>
</div>

