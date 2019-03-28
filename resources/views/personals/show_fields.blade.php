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


