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




<li class="{{ Request::is('plantas*') ? 'active' : '' }}">
    <a href="{!! route('plantas.index') !!}"><i class="fa fa-edit"></i><span>Plantas</span></a>
</li>

<li class="{{ Request::is('mesas*') ? 'active' : '' }}">
    <a href="{!! route('mesas.index') !!}"><i class="fa fa-edit"></i><span>Mesas</span></a>
</li>

<li class="{{ Request::is('reserva*') ? 'active' : '' }}">
    <a href="{!! asset('/reserva') !!}"><i class="fa fa-edit"></i><span>Pedido</span></a>
</li>

<li class="{{ Request::is('pedido/list*') ? 'active' : '' }}">
        <a href="{!! asset('/pedido/list') !!}"><i class="fa fa-edit"></i><span>Listado Pedidos</span></a>
    </li>

<li class="{{ Request::is('clientes*') ? 'active' : '' }}">
    <a href="{!! route('clientes.index') !!}"><i class="fa fa-edit"></i><span>Clientes</span></a>
</li>

<li class="{{ Request::is('cobro*') ? 'active' : '' }}">
        <a href="{!! asset('/cobro') !!}"><i class="fa fa-edit"></i><span>Cobro</span></a>
</li>

<li class="{{ Request::is('list*') ? 'active' : '' }}">
        <a href="{!! asset('/list') !!}"><i class="fa fa-edit"></i><span>Listado Cobros</span></a>
</li>

<li class="{{ Request::is('cierre*') ? 'active' : '' }}">
        <a href="{!! asset('/cierre') !!}"><i class="fa fa-edit"></i><span>Cierre</span></a>
</li>

