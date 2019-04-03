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

class PedidoController extends Controller
{
    //
    public function index(){
        $personal=Auth::user();
        $productos=Producto::where('sucursal_id','=',$personal->personal->sucursal_id)->get();
        $categorias=Categoria::where('sucursal_id','=',$personal->personal->sucursal_id)->get();
        $categoria=new Categoria();
        $categoria->id=0;
        $categoria->nombre_categoria='---Seleccione---';
        $categorias->push($categoria);
        $cat=$categorias->sortBy('id')->pluck('nombre_categoria','id');

        return view('pedido.index')->with('productos',$productos)->with('cat',$cat);

    }
    public function pedido(){
        $id_mesa=Session::get('idm');
        $personal=Auth::user();
        $id_personal=$personal->personal->nombre_personal;
        //Session::forget('idm');
        return view('pedido.index')->with('id_mesa',$id_mesa)->with('id_personal',$id_personal);
    }

}
