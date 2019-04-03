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
use App\Detalle_pedido;

class PedidoController extends Controller
{
    public function __construct(){
        if(!Session::has('cart')){
            Session::put('cart',array());
        }
    }
    //
    public function index(){
        $personal=Auth::user();
        $categorias=Categoria::where('sucursal_id','=',$personal->personal->sucursal_id)->get();
        $categoria=new Categoria();
        $categoria->id=0;
        $categoria->nombre_categoria='---Seleccione---';
        $categorias->push($categoria);
        $cat=$categorias->sortBy('id')->pluck('nombre_categoria','id');
        return view('pedido.index')->with('cat',$cat);

    }

    public function show(){
        $cart=Session::get('cart');
        return view('detalle_pedido.index')->with('cart',$cart);
        // return $cart;
    }

    public function add(Request $request,Producto $producto){
        $cart=Session::get('cart');
        //$dato=array_search($producto->id, array_column($cart, 'producto_id'));
        $detalle=new Detalle_pedido();
        $detalle->producto_id=$producto->id;
        $detalle->nombre_producto=$producto->nombre_producto;
        $detalle->img_producto=$producto->img_producto;
        $detalle->cantidad_detalle_pedido=1;
        $detalle->total_detalle_pedido=$producto->precio_producto * 1.12;
        $cart[]=$detalle;
        Session::put('cart',$cart);
        // Session::forget('cart');
        return redirect('pedido');
        // return $request;
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

}
