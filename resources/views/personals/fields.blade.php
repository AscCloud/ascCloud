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

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style_normalize.css') }}" />
@endsection
<!-- token -->
{!! Form::hidden('token', csrf_token(),['id'=>'token']) !!}
<!-- Img Personal Field -->
<div class="form-group col-sm-6">

        <img class="imagen" id="imagen"  src="{{ asset('images/user.png') }}"/>
        {!! Form::label('img_personal','Foto', ['for'=>'img_personal','id'=>'label']) !!}
        {!! Form::file('img_personal', null, ['class' => 'updatefile']) !!}
</div>

<!-- Ruc Personal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ruc_personal', 'Ruc') !!}
    {!! Form::text('ruc_personal', null, ['class' => 'form-control', 'onkeypress'=>'return soloNumeros(event)']) !!}
</div>

<!-- Nombre Personal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_personal', 'Nombre') !!}
    {!! Form::text('nombre_personal', null, ['class' => 'form-control', 'onkeypress'=>'return soloLetras(event)']) !!}
</div>

<!-- Telefono Personal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono_personal', 'Telefono') !!}
    {!! Form::text('telefono_personal', null, ['class' => 'form-control', 'onkeypress'=>'return soloNumeros(event)']) !!}
</div>

<!-- Email Personal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email_personal', 'Email') !!}
    {!! Form::email('email_personal', null, ['class' => 'form-control']) !!}
</div>
<!-- Empresa field -->
<div class="form-group col-sm-6">
    {!! Form::label('empresa_id', 'Empresa') !!}
    {!! Form::select('empresa_id', $emp, null, ['class' => 'form-control','id'=>'empresa_id']) !!}
</div>

<!-- Nacimiento Personal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nacimiento_personal', 'Fecha de Nacimiento') !!}
    {!! Form::text('nacimiento_personal', null, ['class' => 'form-control','id'=>'nacimiento_personal']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#nacimiento_personal').datetimepicker({
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
@endsection

<!-- Sucursal Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sucursal_id', 'Sucursal') !!}
    {!! Form::select('sucursal_id', ['--Seleccione--'=>'--Seleccione--'], null, ['class' => 'form-control','id'=>'sucursal_id']) !!}
</div>

<!-- Username user Field -->
<div class="form-group col-sm-6">
    {!! Form::label('username', 'Username') !!}
    {!! Form::text('username', null, ['class' => 'form-control']) !!}
</div>
<!-- Password user Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>
<!-- Rol Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rol_id', 'Rol') !!}
    {!! Form::select('rol_id', $r, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('personals.index') !!}" class="btn btn-default">Cancelar</a>
</div>

