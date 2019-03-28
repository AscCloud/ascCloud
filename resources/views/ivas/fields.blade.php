<script>
    function soloNumeros(e){
        var key = window.Event ? e.which : e.keyCode
        return (key >= 48 && key <= 57)
    }
</script>

<!-- Iva Field -->
<div class="form-group col-sm-6">
    {!! Form::label('iva', 'Iva:') !!}
    {!! Form::text('iva', null, ['class' => 'form-control', 'onkeypress'=>'return soloNumeros(event)']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('ivas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
