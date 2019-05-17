<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detalle_pedido;
use Illuminate\Support\Facades\Auth;
use App\Pedido;
use View;

class DespacharController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('chef');
    }

    public function indexcomida(){
        $personal=Auth::user();
        $pedido=Pedido::where('fecha_pedido','=',\Carbon\Carbon::today())->where('sucursal_id','=',$personal->personal->sucursal_id)->where('estado_entrega_pedido','=',false)->get();
        $productos=[];
        $dp;
        foreach ($pedido as $item) {
            $detalle_pedido=Detalle_pedido::where('pedido_id','=',$item->id)->where('estado_detalle_pedido','=',false)->get();
            $productos[$item->id]=$detalle_pedido;
        }
        return view('detalle_pedido.despachar_comida')->with('pedido',$pedido)->with('productos',$productos);
    }

    public function despacharcomida($id){
        $pedido=Pedido::find($id);
        $pedido->estado_entrega_pedido=true;
        $pedido->save();
        $detalle_pedidos=Detalle_pedido::where('pedido_id','=',$id)->get();
        foreach ($detalle_pedidos as $item_producto) {
            $detalle_pedido=Detalle_pedido::find($item_producto->id);
            $detalle_pedido->estado_detalle_pedido=true;
            $detalle_pedido->save();
        }
        return redirect('comida');
    }
}
