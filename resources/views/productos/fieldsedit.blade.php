@section('css')
    <link rel="stylesheet" href="{{ asset('css/style_normalize.css') }}" />
@endsection
<!-- Img Personal Field -->
<div class="form-group col-sm-6">
        <img class="imagen" id="imagen"  src="{!! $producto->img_producto !!}"/>
        {!! Form::label('img_producto','Foto', ['for'=>'img_producto','id'=>'label']) !!}
        {!! Form::file('img_producto', null, ['class' => 'updatefile']) !!}
</div>

<!-- Nombre Producto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_producto', 'Nombre') !!}
    {!! Form::text('nombre_producto', null, ['class' => 'form-control']) !!}
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
@endsection
