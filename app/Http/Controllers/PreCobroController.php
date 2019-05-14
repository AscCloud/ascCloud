<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Flash;
use Response;
use Session;
use Redirect;
use DB;
use App\Pre_Cobro;
use App\Detalle_pedido;
use App\Pre_Cobro_Detalle;
use Illuminate\Support\Facades\Auth;

class PreCobroController extends Controller
{
    //

    public function index($id){
        Session::put('pedido_id',$id);
        return view('pre_cobros.index');
    }

    public function indexseparado($id){
        Session::put('pedido_id',$id);
        return view('pre_cobros.cuentas_separadas');
    }

    public function cliente($ruc){
        $cliente=Cliente::where('ruc_cliente','=',$ruc)->get();
        return $cliente;
    }

    public function pedido($id){
        $pedido=DB::select("select * from pedidocuenta('".$id."')");
        return $pedido;
    }

    public function pedido_separado($id){
        $pedido=DB::select("select * from pedidocuentaseparado('".$id."')");
        return $pedido;
    }

    public function pedido_separado_total($id){
        $pedido=DB::select("select * from pedidocuentaseparadototal('".$id."')");
        return $pedido;
    }

    public function createone(Request $request){
        $precobro=new Pre_Cobro();
        $personal=Auth::user();
        $precobro->fecha_pre_cobro=\Carbon\Carbon::today();
        $precobro->total_pre_cobro=$request->total_cuenta;
        $precobro->cliente_id=$request->cliente_id;
        $precobro->pedido_id=$request->pedido_id;
        $precobro->sucursal_id=$personal->personal->sucursal_id;
        $precobro->save();
        $detalle_pedido_datos=Detalle_pedido::where('pedido_id','=',$request->pedido_id)->get();
        foreach ($detalle_pedido_datos as $item) {
            $detalle_pedido=Detalle_pedido::find($item->id);
            $detalle_pedido->estado_detalle_pedido_cobrado=true;
            $detalle_pedido->save();
        }
        Flash::success('Guardado Exitosamente.');
        return "guarado exitosamente";
    }

    public function createmany(Request $request){
        try{
            DB::beginTransaction();
            $precobro=new Pre_Cobro();
            $personal=Auth::user();
            $detalle=[];
            $precobro_detalle_datos=json_decode($request->productos_ids);
            foreach ($precobro_detalle_datos as $dato) {
                $precobro_detalle=Detalle_pedido::find($dato);
                $detalle[]=$precobro_detalle;
            }
            $subtotal=$this->subtotal_cuenta($detalle);
            $servicio=$this->servicio_cuenta($detalle);
            $total=round($this->total_cuenta($detalle,$servicio),2);

            $precobro->fecha_pre_cobro=\Carbon\Carbon::today();
            $precobro->total_pre_cobro=$total;
            $precobro->cliente_id=$request->cliente_id;
            $precobro->pedido_id=$request->pedido_id;
            $precobro->estado_pre_cobro=true;
            $precobro->sucursal_id=$personal->personal->sucursal_id;
            $items=[];
            foreach ($precobro_detalle_datos as $item_producto) {
                $pre_cobro_detalle_item=new Pre_Cobro_Detalle();
                $pre_cobro_detalle_item->detalle_pedido_id=$item_producto;
                $pre_cobro_detalle_item->sucursal_id=$personal->personal->sucursal_id;
                $items[]=$pre_cobro_detalle_item;
            }
            $precobro->save();
            $precobro->pre_cobro()->saveMany($items);
            foreach ($precobro_detalle_datos as $dato) {
                $detalle_pedido=Detalle_pedido::find($dato);
                $detalle_pedido->estado_detalle_pedido_cobrado=true;
                $detalle_pedido->save();
            }
            Flash::success('Guardado Exitosamente.');
            DB::commit();
            return "guarado exitosamente";
        }catch(\Exception $e){
            DB::rollBack();
            Flash::error('error');
            return $e;
        }

    }

    private function subtotal_cuenta($cart){
        $subtotal=0;
        foreach ($cart as $clave => $item) {
            $subtotal +=$item->producto->precio_producto *$item->cantidad_detalle_pedido;
        }
        return $subtotal;
    }

    private function total_cuenta($cart,$servicio){
        $cart=$cart;
        $total=0;
        foreach ($cart as $clave => $item) {
            $total +=(($item->producto->precio_producto)*(($item->producto->iva->iva/100)+1)) *$item->cantidad_detalle_pedido;
        }
        $total=$total+$servicio;
        return $total;
    }

    private function servicio_cuenta($cart){
        $cart=$cart;
        $total=0;
        $servicio=0;
        foreach ($cart as $clave => $item) {
            $total +=(($item->producto->precio_producto)) *$item->cantidad_detalle_pedido;
        }
        $servicio=$total*0.10;
        return $servicio;
    }
}
