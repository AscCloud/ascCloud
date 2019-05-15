@section('scripts')
    <script type="text/javascript">
        $('#nacimiento_cliente').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false
        })
    </script>
    <script>
        $(document).ready(function(){
          $('#img_personal').change(function() {
                var a=window.location.host;
                var b=document.querySelector('#img_personal').files[0];
                var dato =URL.createObjectURL(b)
                var elemento = document.getElementById("imagen");
                document.querySelector('#imagen').src=dato
            });
        });
    </script>
    <script src="{{ asset('js/dependencias_empresa_sucursal.js') }}"></script>
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
@endsection

<!-- Ruc Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ruc_cliente', 'Ruc Cliente:') !!}
    {!! Form::text('ruc_cliente', null, ['class' => 'form-control', 'onkeypress'=>'return soloNumeros(event)']) !!}
</div>

<!-- Nombre Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_cliente', 'Nombre Cliente:') !!}
    {!! Form::text('nombre_cliente', null, ['class' => 'form-control', 'onkeypress'=>'return soloLetras(event)']) !!}
</div>

<!-- Telefono Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono_cliente', 'Telefono Cliente:') !!}
    {!! Form::text('telefono_cliente', null, ['class' => 'form-control', 'onkeypress'=>'return soloNumeros(event)']) !!}
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


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('clientes.index') !!}" class="btn btn-default">Cancel</a>
</div>
