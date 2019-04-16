<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $cliente->id !!}</p>
</div>

<!-- Ruc Cliente Field -->
<div class="form-group">
    {!! Form::label('ruc_cliente', 'Ruc Cliente:') !!}
    <p>{!! $cliente->ruc_cliente !!}</p>
</div>

<!-- Nombre Cliente Field -->
<div class="form-group">
    {!! Form::label('nombre_cliente', 'Nombre Cliente:') !!}
    <p>{!! $cliente->nombre_cliente !!}</p>
</div>

<!-- Telefono Cliente Field -->
<div class="form-group">
    {!! Form::label('telefono_cliente', 'Telefono Cliente:') !!}
    <p>{!! $cliente->telefono_cliente !!}</p>
</div>

<!-- Email Cliente Field -->
<div class="form-group">
    {!! Form::label('email_cliente', 'Email Cliente:') !!}
    <p>{!! $cliente->email_cliente !!}</p>
</div>

<!-- Nacimiento Cliente Field -->
<div class="form-group">
    {!! Form::label('nacimiento_cliente', 'Nacimiento Cliente:') !!}
    <p>{!! $cliente->nacimiento_cliente !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $cliente->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $cliente->updated_at !!}</p>
</div>

