<li class="{{ Request::is('empresas*') ? 'active' : '' }}">
    <a href="{!! route('empresas.index') !!}"><i class="fa fa-edit"></i><span>Empresas</span></a>
</li>

<li class="{{ Request::is('sucursals*') ? 'active' : '' }}">
    <a href="{!! route('sucursals.index') !!}"><i class="fa fa-edit"></i><span>Sucursals</span></a>
</li>



<li class="{{ Request::is('personals*') ? 'active' : '' }}">
    <a href="{!! route('personals.index') !!}"><i class="fa fa-edit"></i><span>Personals</span></a>
</li>

<li class="{{ Request::is('categorias*') ? 'active' : '' }}">
    <a href="{!! route('categorias.index') !!}"><i class="fa fa-edit"></i><span>Categorias</span></a>
</li>


<li class="{{ Request::is('ivas*') ? 'active' : '' }}">
    <a href="{!! route('ivas.index') !!}"><i class="fa fa-edit"></i><span>Ivas</span></a>
</li>



<li class="{{ Request::is('productos*') ? 'active' : '' }}">
    <a href="{!! route('productos.index') !!}"><i class="fa fa-edit"></i><span>Productos</span></a>
</li>

