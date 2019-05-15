<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use Flash;
use Session;
use Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Mesa;
use App\Detalle_pedido;
use DB;

class PedidoController extends Controller
{
    public function __construct(){
        if(!Session::has('cart')){
            Session::put('cart',array());
        }
    }
    //

    public function index(){
        $id_mesa=Session::get('idm');
        if(!empty($id_mesa)){
            $personal=Auth::user();
            $categorias=Categoria::where('sucursal_id','=',$personal->personal->sucursal_id)->get();
            $categoria=new Categoria();
            $categoria->id=0;
            $categoria->nombre_categoria='---Seleccione---';
            $categorias->push($categoria);
            $cat=$categorias->sortBy('id')->pluck('nombre_categoria','id');
            return view('pedido.index')->with('cat',$cat);
        }else{
            return redirect('reserva');
        }
        // Session::forget('idm');
    }

    public function show(){
        $cart=Session::get('cart');
        $subtotal = $this->subtotal();
        $servicio=$this->servicio();
        $total=$this->total($servicio);
        if(empty($cart)){
            $iva='';
        }else{
            $iva=Session::get('iva');

        }
        return view('detalle_pedido.index')->with('cart',$cart)->with('subtotal',$subtotal)->with('iva',$iva)->with('total',$total)->with('servicio',$servicio);
    }

    public function add(Producto $producto){
        $cart=Session::get('cart');
        //$dato=array_search($producto->id, array_column($cart, 'producto_id'));
        $detalle=new Detalle_pedido();
        $detalle->producto_id=$producto->id;
        $detalle->nombre_producto=$producto->nombre_producto;
        $detalle->img_producto=$producto->img_producto;
        Session::put('iva',$producto->iva->iva);
        $detalle->iva=$producto->iva->iva;
        $detalle->cantidad_detalle_pedido=1;
        $detalle->precio_producto=$producto->precio_producto;
        $detalle->observacion_detalle_pedido='';
        $cart[]=$detalle;
        Session::put('cart',$cart);
        // Session::forget('cart');
        return redirect('pedido');
        // return $request;
    }

    public function delete(Producto $producto,$dot){
        $cart=Session::get('cart');
        unset($cart[$dot]);
        Session::put('cart',$cart);
        return redirect('pedido/detalle');
    }

    public function update(Producto $producto,$dot,$cantidad,$observacion){
        $cart=Session::get('cart');
        $cart[$dot]->cantidad_detalle_pedido=$cantidad;
        $cart[$dot]->observacion_detalle_pedido=$observacion;
        Session::put('cart',$cart);
        return redirect('pedido/detalle');
    }

    private function subtotal(){
        $cart=Session::get('cart');
        $subtotal=0;
        foreach ($cart as $clave => $item) {
            $subtotal +=$item->precio_producto *$item->cantidad_detalle_pedido;
        }
        return $subtotal;
    }

    private function total($servicio){
        $cart=Session::get('cart');
        $total=0;
        foreach ($cart as $clave => $item) {
            $total +=(($item->precio_producto)*(($item->iva/100)+1)) *$item->cantidad_detalle_pedido;
        }
        $total=$total+$servicio;
        return $total;
    }

    private function servicio(){
        $cart=Session::get('cart');
        $total=0;
        $servicio=0;
        foreach ($cart as $clave => $item) {
            $total +=(($item->precio_producto)) *$item->cantidad_detalle_pedido;
        }
        $servicio=$total*0.10;
        return $servicio;
    }



    public function sinupdate(Producto $producto,$dot,$cantidad){
        $cart=Session::get('cart');
        $cart[$dot]->cantidad_detalle_pedido=$cantidad;
        $cart[$dot]->observacion_detalle_pedido='';
        Session::put('cart',$cart);
        return redirect('pedido/detalle');
    }

    public function pedido(){
        $id_mesa=Session::get('idm');
        $personal=Auth::user();
        $id_personal=$personal->personal->nombre_personal;
        //Session::forget('idm');
        return view('pedido.index')->with('id_mesa',$id_mesa)->with('id_personal',$id_personal);
    }

    public function categorias(Request $request){
        $personal=Auth::user();
        $productos=Producto::where('sucursal_id','=',$personal->personal->sucursal_id)->where('categoria_id','=',$request->id)->get();
        return $productos;
    }

    public function create(){
        $ped=Session::get('cart');
        if(!empty($ped)){
            try{
                DB::beginTransaction();
                $cabecera=new Pedido();
                $personal=Auth::user();
                $cabecera->sucursal_id=$personal->personal->sucursal_id;
                $cabecera->personal_id=$personal->personal->id;
                $cabecera->mesa_id=Session::get('idm');
                $cabecera->fecha_pedido=\Carbon\Carbon::today();
                $servicio=$this->servicio();
                $subtotal = $this->subtotal();
                $cabecera->subtotal_pedido=round($subtotal,2);
                $cabecera->servicio_pedido=round($servicio,2);
                $cabecera->total_pedido=round($this->total($servicio),2);
                $iva=Session::get('iva');
                $cabecera->iva_pedido=round($subtotal*($iva/100),2);
                $cart=Session::get('cart');
                $cabecera->save();
                $detalles=[];
                foreach ($cart as $clave => $item) {
                    $detalle_pedido=new Detalle_pedido();
                    $detalle_pedido->cantidad_detalle_pedido=$item->cantidad_detalle_pedido;
                    if($item->observacion_detalle_pedido!=''){
                        $detalle_pedido->observacion_detalle_pedido=$item->observacion_detalle_pedido;
                    }

                    $detalle_pedido->total_detalle_pedido=round($item->precio_producto * $item->cantidad_detalle_pedido,2);
                    $detalle_pedido->producto_id=$item->producto_id;
                    $detalle_pedido->sucursal_id=$personal->personal->sucursal_id;
                    $detalles[]=$detalle_pedido;
                }
                $cabecera->detalle()->saveMany($detalles);
                DB::commit();
                $mesa=Mesa::find(Session::get('idm'));
                $mesa->estado_mesa=true;
                $mesa->save();
                Flash::success('Pedido saved successfully.');
                Session::forget('idm');
                Session::forget('cart');
                return redirect('pedido');
            }catch(\Exception $e){
                DB::rollBack();
                return $e;
            }
        }else{
            Flash::error('No se encuentran productos agregados.');
            return redirect('pedido/detalle');
        }
    }

    public function list(){
        $personal=Auth::user();
        $pedidos=Pedido::where('sucursal_id','=',$personal->personal->sucursal_id)->where('estado_pedido','=',false)->get();
        $detalles=[];
        foreach ($pedidos as $clave => $item) {
            $detalle_pedido=Detalle_pedido::where('pedido_id','=',$item->id)->get();
            $detalles[]=$detalle_pedido;
        }
        return view('pedido.list')->with('pedidos',$pedidos)->with('detalle',$detalles);
    }

    public function edit($id){
        Session::put('idpedido',$id);
        $cartedit=Session::put('cartedit',array());
        $detalles=Detalle_pedido::where('pedido_id','=',$id)->get();
        foreach ($detalles as $det) {
            $detalle=new Detalle_pedido();
            $detalle->producto_id=$det->producto_id;
            $detalle->nombre_producto=$det->producto->nombre_producto;
            $detalle->img_producto=$det->producto->img_producto;
            $detalle->estado_detalle_pedido=$det->estado_detalle_pedido;
            Session::put('iva',$det->producto->iva->iva);
            $detalle->cantidad_detalle_pedido=$det->cantidad_detalle_pedido;
            $detalle->precio_producto=$det->producto->precio_producto;
            $detalle->observacion_detalle_pedido=$det->observacion_detalle_pedido;
            $cartedit[]=$detalle;
        }
        Session::put('cartedit',$cartedit);
        $cart=Session::get('cartedit');
        $subtotal = $this->subtotal_cuenta();
        $servicio=$this->servicio_cuenta();
        $total=$this->total_cuenta($servicio);
        if(empty($cart)){
            $iva='';
        }else{
            $iva=Session::get('iva');

        }
        return view('detalle_pedido.edit')->with('cart',$cart)->with('subtotal',$subtotal)->with('iva',$iva)->with('total',$total)->with('servicio',$servicio);
        // Session::forget('idpedido');
        // Session::forget('subtotal');
        // Session::forget('iva');
        // Session::forget('servicio');
        // Session::forget('total');
    }

    public function editar($id){
        Session::put('idpedido',$id);
        $cartedit=Session::put('cartedit',array());
        $detalles=Detalle_pedido::where('pedido_id','=',$id)->get();
        foreach ($detalles as $det) {
            $detalle=new Detalle_pedido();
            $detalle->producto_id=$det->producto_id;
            $detalle->nombre_producto=$det->producto->nombre_producto;
            $detalle->img_producto=$det->producto->img_producto;
            $detalle->estado_detalle_pedido=$det->estado_detalle_pedido;
            Session::put('iva',$det->producto->iva->iva);
            $detalle->cantidad_detalle_pedido=$det->cantidad_detalle_pedido;
            $detalle->precio_producto=$det->producto->precio_producto;
            $detalle->observacion_detalle_pedido=$det->observacion_detalle_pedido;
            $cartedit[]=$detalle;
        }
        Session::put('cartedit',$cartedit);
        $cart=Session::get('cartedit');
        $subtotal = $this->subtotal_cuenta();
        $servicio=$this->servicio_cuenta();
        $total=$this->total_cuenta($servicio);
        if(empty($cart)){
            $iva='';
        }else{
            $iva=Session::get('iva');

        }
        return view('detalle_pedido.lista_detalle')->with('cart',$cart)->with('subtotal',$subtotal)->with('iva',$iva)->with('total',$total)->with('servicio',$servicio);
    }

    private function subtotal_cuenta(){
        $cart=Session::get('cartedit');
        $subtotal=0;
        foreach ($cart as $clave => $item) {
            $subtotal +=$item->precio_producto *$item->cantidad_detalle_pedido;
        }
        return $subtotal;
    }

    private function total_cuenta($servicio){
        $cart=Session::get('cartedit');
        $total=0;
        foreach ($cart as $clave => $item) {
            $total +=(($item->precio_producto)*(($item->iva/100)+1)) *$item->cantidad_detalle_pedido;
        }
        $total=$total+$servicio;
        return $total;
    }

    private function servicio_cuenta(){
        $cart=Session::get('cartedit');
        $total=0;
        $servicio=0;
        foreach ($cart as $clave => $item) {
            $total +=(($item->precio_producto)) *$item->cantidad_detalle_pedido;
        }
        $servicio=$total*0.10;
        return $servicio;
    }

}
