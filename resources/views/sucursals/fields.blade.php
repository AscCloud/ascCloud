@section('css')
    <link rel="stylesheet" href="{{ asset('css/style_normalize.css') }}" />
@endsection

<!-- Img Sucursal Field -->
<div class="form-group col-sm-6">
        <img class="imagen" id="imagen"  src="{{ asset('images/sucursales.png') }}"/>
        {!! Form::label('img_sucursal','Foto', ['for'=>'img_sucursal','id'=>'label']) !!}
        {!! Form::file('img_sucursal', null, ['class' => 'updatefile']) !!}
</div>

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

<!-- Establecimiento Sucursal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('establecimiento_sucursal', 'Establecimiento') !!}
    {!! Form::text('establecimiento_sucursal', null, ['class' => 'form-control', 'onkeypress'=>'return soloNumeros(event)']) !!}
</div>

<!-- Punto de Emision Sucursal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('punto_emision_sucursal', 'Punto Emision') !!}
    {!! Form::text('punto_emision_sucursal', null, ['class' => 'form-control', 'onkeypress'=>'return soloNumeros(event)']) !!}
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
@section('scripts')
    <script>
        $(document).ready(function(){
          $('#img_sucursal').change(function() {
                var a=window.location.host;
                var b=document.querySelector('#img_sucursal').files[0];
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

</script>
@endsection
