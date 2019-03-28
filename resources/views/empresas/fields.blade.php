<script>
        function soloLetras(e){
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
            especiales = "8-37-39-46";

            tecla_especial = false
            for(var i in especiales){
                if(key == especiales[i]){
                        ecla_especial = true;
                break;
                }
            }

            if(letras.indexOf(tecla)==-1 && !tecla_especial){
                return false;
            }
        }

</script>
<!-- Nombre Empresa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_empresa', 'Nombre') !!}
    {!! Form::text('nombre_empresa', null, ['class' => 'form-control', 'onkeypress'=>'return soloLetras(event)']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('empresas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
