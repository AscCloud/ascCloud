<!-- Nombre Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_cliente', 'Nombre Cliente:') !!}
    {!! Form::text('nombre_cliente', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellido Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellido_cliente', 'Apellido Cliente:') !!}
    {!! Form::text('apellido_cliente', null, ['class' => 'form-control']) !!}
</div>

<!-- Ruc Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ruc_cliente', 'Ruc Cliente:') !!}
    {!! Form::text('ruc_cliente', null, ['class' => 'form-control']) !!}
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

<!-- Direccion Cliente Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('direccion_cliente', 'Direccion Cliente:') !!}
    {!! Form::textarea('direccion_cliente', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('clientes.index') !!}" class="btn btn-default">Cancel</a>
</div>
