@section('css')
    <link rel="stylesheet" href="{{ asset('css/style_normalize.css') }}" />
@endsection
<!-- Img Personal Field -->
<div class="form-group col-sm-6">
        <img class="imagen" id="imagen"  src="{{ asset('images/producto.png') }}"/>
        {!! Form::label('img_producto','Foto', ['for'=>'img_producto','id'=>'label']) !!}
        {!! Form::file('img_producto', null, ['class' => 'updatefile']) !!}
</div>

<!-- Nombre Producto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_producto', 'Nombre') !!}
    {!! Form::text('nombre_producto', null, ['class' => 'form-control', 'onkeypress'=>'return soloLetras(event)']) !!}
</div>

<!-- Precio Producto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precio_producto', 'Precio') !!}
    {!! Form::text('precio_producto', null, ['class' => 'form-control']) !!}
</div>
<!-- Iva id -->
{!! Form::hidden('iva_id',1,['id'=>'iva_id']) !!}

<!-- Sucursal Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sucursal_id', 'Sucursal') !!}
    {!! Form::select('sucursal_id', $suc, null, ['class' => 'form-control']) !!}
</div>

<!-- Categoria Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_id', 'Categoria') !!}
    {!! Form::select('categoria_id', $cat, null, ['class' => 'form-control']) !!}
</div>

<!-- Especificacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('especificacion_producto', 'Especificacion') !!}
    {!! Form::select('especificacion_producto', ['Comida' => 'Comida', 'Bebidas' => 'Bebidas'] , null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('productos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
@section('scripts')
    <script>
        $(document).ready(function(){
          $('#img_producto').change(function() {
                var a=window.location.host;
                var b=document.querySelector('#img_producto').files[0];
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
