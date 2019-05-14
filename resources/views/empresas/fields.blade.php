@section('css')
    <link rel="stylesheet" href="{{ asset('css/style_normalize.css') }}" />
@endsection

<!-- Img Personal Field -->
<div class="form-group col-sm-6">
        <img class="imagen" id="imagen"  src="{{ asset('images/empresa.png') }}"/>
        {!! Form::label('img_empresa','Foto', ['for'=>'img_empresa','id'=>'label']) !!}
        {!! Form::file('img_empresa', null, ['class' => 'updatefile']) !!}
</div>

<!-- Ruc Empresa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ruc_empresa', 'Ruc') !!}
    {!! Form::text('ruc_empresa', null, ['class' => 'form-control', 'onkeypress'=>'return soloNumeros(event)']) !!}
</div>
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

@section('scripts')
    <script>
        $(document).ready(function(){
          $('#img_empresa').change(function() {
                var a=window.location.host;
                var b=document.querySelector('#img_empresa').files[0];
                var dato =URL.createObjectURL(b)
                var elemento = document.getElementById("imagen");
                document.querySelector('#imagen').src=dato
            });
        });
    </script>
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
