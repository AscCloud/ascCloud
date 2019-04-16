<!-- Ruc Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ruc_cliente', 'Ruc Cliente:') !!}
    {!! Form::text('ruc_cliente', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_cliente', 'Nombre Cliente:') !!}
    {!! Form::text('nombre_cliente', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono_cliente', 'Telefono Cliente:') !!}
    {!! Form::text('telefono_cliente', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email_cliente', 'Email Cliente:') !!}
    {!! Form::email('email_cliente', null, ['class' => 'form-control']) !!}
</div>

<!-- Nacimiento Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nacimiento_cliente', 'Nacimiento Cliente:') !!}
    {!! Form::text('nacimiento_cliente', null, ['class' => 'form-control','id'=>'nacimiento_cliente']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#nacimiento_cliente').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('clientes.index') !!}" class="btn btn-default">Cancel</a>
</div>
