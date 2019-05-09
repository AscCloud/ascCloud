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

class EditPedidoController extends Controller
{
    //
    public function agregar(){
        $cart=Session::get('cartedit');
        $personal=Auth::user();
        $categorias=Categoria::where('sucursal_id','=',$personal->personal->sucursal_id)->get();
        $categoria=new Categoria();
        $categoria->id=0;
        $categoria->nombre_categoria='---Seleccione---';
        $categorias->push($categoria);
        $cat=$categorias->sortBy('id')->pluck('nombre_categoria','id');
        return view('pedido.edit')->with('cat',$cat);
    }

    public function show(){
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
    }

    public function add(Producto $producto){
        $cart=Session::get('cartedit');
        //$dato=array_search($producto->id, array_column($cart, 'producto_id'));
        $detalle=new Detalle_pedido();
        $detalle->producto_id=$producto->id;
        $detalle->nombre_producto=$producto->nombre_producto;
        $detalle->img_producto=$producto->img_producto;
        $detalle->estado_detalle_pedido=false;
        Session::put('iva',$producto->iva->iva);
        $detalle->cantidad_detalle_pedido=1;
        $detalle->precio_producto=$producto->precio_producto;
        $detalle->observacion_detalle_pedido='';
        $cart[]=$detalle;
        Session::put('cartedit',$cart);
        // Session::forget('cart');
        return redirect('agregar');
        // return $request;
    }

    public function delete(Producto $producto,$dot){
        $cart=Session::get('cartedit');
        unset($cart[$dot]);
        Session::put('cartedit',$cart);
        return redirect('agregar/detalle');
    }

    public function update(Producto $producto,$dot,$cantidad,$observacion){
        $cart=Session::get('cartedit');
        $cart[$dot]->cantidad_detalle_pedido=$cantidad;
        $cart[$dot]->observacion_detalle_pedido=$observacion;
        Session::put('cart',$cart);
        return redirect('agregar/detalle');
    }

    public function sinupdate(Producto $producto,$dot,$cantidad){
        $cart=Session::get('cartedit');
        $cart[$dot]->cantidad_detalle_pedido=$cantidad;
        $cart[$dot]->observacion_detalle_pedido='';
        Session::put('cart',$cart);
        return redirect('agregar/detalle');
    }

    public function create(){
        $ped=Session::get('cartedit');
        $idpedido=Session::get('idpedido');
        if(!empty($ped)){
            try{
                DB::beginTransaction();
                $cabecera=Pedido::find($idpedido);
                $personal=Auth::user();
                $servicio=$this->servicio_cuenta();
                $subtotal = $this->subtotal_cuenta();
                $cabecera->subtotal_pedido=round($subtotal,2);
                $cabecera->servicio_pedido=round($servicio,2);
                $cabecera->total_pedido=$this->total_cuenta($servicio);
                $iva=Session::get('iva');
                $cabecera->iva_pedido=round($subtotal*($iva/100),2);
                $cart=Session::get('cartedit');
                $cabecera->save();
                $detalles=[];
                foreach ($cart as $clave => $item) {
                    if($item->estado_detalle_pedido==false){
                        $detalle_pedido=new Detalle_pedido();
                        $detalle_pedido->cantidad_detalle_pedido=$item->cantidad_detalle_pedido;
                        if($item->observacion_detalle_pedido!=''){
                            $detalle_pedido->observacion_detalle_pedido=$item->observacion_detalle_pedido;
                        }
                        $detalle_pedido->total_detalle_pedido=round($item->precio_producto * $item->cantidad_detalle_pedido,2);
                        $detalle_pedido->producto_id=$item->producto_id;
                        $detalle_pedido->pedido_id=$idpedido;
                        $detalle_pedido->sucursal_id=$personal->personal->sucursal_id;
                        $detalle_pedido->save();
                    }
                }
                DB::commit();
                Flash::success('Pedido saved successfully.');
                Session::forget('idpedido');
                Session::forget('cartedit');
                return redirect('pedido/list');
            }catch(\Exception $e){
                DB::rollBack();
                return $e;
            }
        }else{
            Flash::error('No se encuentran productos agregados.');
            return redirect('pedido/list');
        }
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
            $total +=(($item->precio_producto)*(($item->iva/100)+1)) *$item->cantidad_detalle_pedido;
        }
        $servicio=$total*0.10;
        return $servicio;
    }
}
