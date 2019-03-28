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

        function soloNumeros(e){
            var key = window.Event ? e.which : e.keyCode
            return (key >= 48 && key <= 57)
        }
</script>

<!-- Nombre Sucursal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_sucursal', 'Nombre') !!}
    {!! Form::text('nombre_sucursal', null, ['class' => 'form-control', 'onkeypress'=>'return soloLetras(event)']) !!}
</div>

<!-- Direccion Sucursal Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('direccion_sucursal', 'Direccion') !!}
    {!! Form::textarea('direccion_sucursal', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Sucursal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono_sucursal', 'Telefono') !!}
    {!! Form::text('telefono_sucursal', null, ['class' => 'form-control', 'onkeypress'=>'return soloNumeros(event)']) !!}
</div>

<!-- Empresa Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('empresa_id', 'Empresa') !!}
    {!! Form::select('empresa_id', $emp, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('sucursals.index') !!}" class="btn btn-default">Cancelar</a>
</div>
