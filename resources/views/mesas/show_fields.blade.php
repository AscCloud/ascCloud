<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $mesa->id !!}</p>
</div>

<!-- Numero Field -->
<div class="form-group">
    {!! Form::label('numero', 'Numero:') !!}
    <p>{!! $mesa->numero_mesa !!}</p>
</div>

<!-- Planta Id Field -->
<div class="form-group">
    {!! Form::label('planta_id', 'Planta Id:') !!}
    <p>{!! $mesa->planta_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $mesa->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $mesa->updated_at !!}</p>
</div>

