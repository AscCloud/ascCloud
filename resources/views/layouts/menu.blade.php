@if (Auth::user()->rol_id==5 || Auth::user()->rol_id==1)
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


    <li class="{{ Request::is('productos*') ? 'active' : '' }}">
        <a href="{!! route('productos.index') !!}"><i class="fa fa-edit"></i><span>Productos</span></a>
    </li>




    <li class="{{ Request::is('plantas*') ? 'active' : '' }}">
        <a href="{!! route('plantas.index') !!}"><i class="fa fa-edit"></i><span>Plantas</span></a>
    </li>

    <li class="{{ Request::is('mesas*') ? 'active' : '' }}">
        <a href="{!! route('mesas.index') !!}"><i class="fa fa-edit"></i><span>Mesas</span></a>
    </li>
@endif

@if (Auth::user()->rol_id==3 || Auth::user()->rol_id==5 || Auth::user()->rol_id==1)
    <li class="{{ Request::is('comida*') ? 'active' : '' }}">
        <a href="{!! asset('/comida') !!}"><i class="fa fa-edit"></i><span>Despachar</span></a>
    </li>
@endif

@if (Auth::user()->rol_id==2 || Auth::user()->rol_id==5 || Auth::user()->rol_id==1)

    <li class="{{ Request::is('reserva*') ? 'active' : '' }}">
        <a href="{!! asset('/reserva') !!}"><i class="fa fa-edit"></i><span>Pedido</span></a>
    </li>

    <li class="{{ Request::is('pedido/list*') ? 'active' : '' }}">
        <a href="{!! asset('/pedido/list') !!}"><i class="fa fa-edit"></i><span>Listado Pedidos</span></a>
    </li>

    <li class="{{ Request::is('clientes*') ? 'active' : '' }}">
        <a href="{!! route('clientes.index') !!}"><i class="fa fa-edit"></i><span>Clientes</span></a>
    </li>


@endif

@if (Auth::user()->rol_id==2)
    <li class="{{ Request::is('pedido/meseros*') ? 'active' : '' }}">
        <a href="{!! asset('/pedido/meseros') !!}"><i class="fa fa-edit"></i><span>Listado Pedidos por Fecha</span></a>
    </li>
@endif

@if (Auth::user()->rol_id==4)
    <li class="{{ Request::is('pedido/list*') ? 'active' : '' }}">
        <a href="{!! asset('/pedido/list') !!}"><i class="fa fa-edit"></i><span>Listado Pedidos</span></a>
    </li>

@endif

@if (Auth::user()->rol_id==4 || Auth::user()->rol_id==5 || Auth::user()->rol_id==1)
    <li class="{{ Request::is('pedido/caja*') ? 'active' : '' }}">
        <a href="{!! asset('/pedido/caja') !!}"><i class="fa fa-edit"></i><span>Listado Pedidos por Fecha</span></a>
    </li>
<li class="{{ Request::is('pedido/meseros*') ? 'active' : '' }}">
        <a href="{!! asset('/pedido/meseros') !!}"><i class="fa fa-edit"></i><span>Listado Pedidos Mesero</span></a>
    </li>
    <li class="{{ Request::is('cobro*') ? 'active' : '' }}">
            <a href="{!! asset('/cobro') !!}"><i class="fa fa-edit"></i><span>Cobro</span></a>
    </li>

    <li class="{{ Request::is('list/precobro*') ? 'active' : '' }}">
            <a href="{!! asset('/list/precobro') !!}"><i class="fa fa-edit"></i><span>Listado Pre Cobros</span></a>
    </li>

    <li class="{{ Request::is('cierres*') ? 'active' : '' }}">
            <a href="{!! asset('/cierres') !!}"><i class="fa fa-edit"></i><span>Cierre</span></a>
    </li>

    <li class="{{ Request::is('cierre/fecha*') ? 'active' : '' }}">
            <a href="{!! asset('/cierre/fecha') !!}"><i class="fa fa-edit"></i><span>Cierre Por Fecha</span></a>
    </li>

    <li class="{{ Request::is('reportes*') ? 'active' : '' }}">
            <a href="{!! asset('/reportes') !!}"><i class="fa fa-edit"></i><span>Ventas</span></a>
    </li>

    <li class="{{ Request::is('reporte/venta*') ? 'active' : '' }}">
            <a href="{!! asset('/reporte/venta') !!}"><i class="fa fa-edit"></i><span>Ventas Por Fecha</span></a>
    </li>
@endif
