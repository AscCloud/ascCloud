<li class="{{ Request::is('empresas*') ? 'active' : '' }}">
    <a href="{!! route('empresas.index') !!}"><i class="fa fa-edit"></i><span>Empresa</span></a>
</li>

<li class="{{ Request::is('sucursals*') ? 'active' : '' }}">
    <a href="{!! route('sucursals.index') !!}"><i class="fa fa-edit"></i><span>Sucursal</span></a>
</li>



<li class="{{ Request::is('personals*') ? 'active' : '' }}">
    <a href="{!! route('personals.index') !!}"><i class="fa fa-edit"></i><span>Personal</span></a>
</li>

<li class="{{ Request::is('categorias*') ? 'active' : '' }}">
    <a href="{!! route('categorias.index') !!}"><i class="fa fa-edit"></i><span>Categorias</span></a>
</li>


<li class="{{ Request::is('ivas*') ? 'active' : '' }}">
    <a href="{!! route('ivas.index') !!}"><i class="fa fa-edit"></i><span>Iva</span></a>
</li>



<li class="{{ Request::is('productos*') ? 'active' : '' }}">
    <a href="{!! route('productos.index') !!}"><i class="fa fa-edit"></i><span>Productos</span></a>
</li>

