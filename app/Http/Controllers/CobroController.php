<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cobro;
use App\Detalle_cobro;
use App\Detalle_pedido;
use App\Pre_Cobro;
use App\Pedido;
use App\Pre_Cobro_Detalle;
use App\Models\Mesa;
use Illuminate\Support\Facades\Auth;
use View;
use Flash;
use Response;
use Session;
use Redirect;
use DB;
use PDF;
use Dompdf\Dompdf;

class CobroController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('mesero');
    }

    public function index(){
        $personal=Auth::user();
        $cobros=Pre_Cobro::where('sucursal_id','=',$personal->personal->sucursal_id)->where('fecha_pre_cobro','=',\Carbon\Carbon::today())->where('estado_cobro','=',false)->get();
        return view('cobros.index')->with('cobros',$cobros);
    }

    public function showmoney($id){
        Session::put('precobro_id',$id);
        $precobro=Pre_Cobro::find($id);
        return view('cobros.cobro')->with('precobro',$precobro);
    }

    public function list(){
        $personal=Auth::user();
        $cobros=Cobro::where('sucursal_id','=',$personal->personal->sucursal_id)->where('fecha_cobro','=',\Carbon\Carbon::today())->get();
        return view('cobros.list')->with('cobros',$cobros);
    }

    public function showpdf($id){
        $cobros=Cobro::find($id);
        $estado=$cobros->precobro->estado_pre_cobro;
        if($estado==false){
            $cabeceras=DB::select("select * from cobros_cabecera('".$id."')");
            $detalle_cabeceras=DB::select("select * from cobros_detalle('".$cobros->id."')");
            $detalle=[];
            foreach ($detalle_cabeceras as $item) {
                $detalle_item=Detalle_pedido::find($item->id);
                $detalle[]=$detalle_item;
            }
            $subtotal=round($this->subtotal_cuenta($detalle),2);
            $servicio=round($this->servicio_cuenta($detalle),2);
            $total=round($this->total_cuenta($detalle,$servicio),2);
            $iva=round($this->iva($detalle,$subtotal),2);
            $view=\View::make('facturas.fac', compact('cabeceras','detalle_cabeceras','subtotal','servicio','iva','total'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper(array(0,0,200,100000));
            $pdf->loadHTML($view);
            return $pdf->stream('factura');
        } else if($estado==true){
            $cabeceras=DB::select("select * from cobros_cabecera('".$id."')");
            $precobro_detalle=Pre_Cobro_Detalle::where('pre_cobro_id','=',$cobros->precobro_id)->get();
            $detalle_cabeceras=DB::select("select * from cobros_detalle_separados('".$cobros->precobro_id."')");
            $detalle_separado=[];
            foreach ($precobro_detalle as $item_producto) {
                $detalle_item_separdado=Detalle_pedido::find($item_producto->detalle_pedido_id);
                $detalle_separado[]=$detalle_item_separdado;
            }
            $subtotal=round($this->subtotal_cuenta($detalle_separado),2);
            $servicio=round($this->servicio_cuenta($detalle_separado),2);
            $total=round($this->total_cuenta($detalle_separado,$servicio),2);
            $iva=round($this->iva($detalle_separado,$subtotal),2);
            $view=\View::make('facturas.fac', compact('cabeceras','detalle_cabeceras','subtotal','servicio','iva','total'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper(array(0,0,200,100000));
            $pdf->loadHTML($view);
            return $pdf->stream('factura');
        }
    }

    public function showpdfpre($id){
        $pre_cobro_im=Pre_Cobro::find($id);
        $estado=$pre_cobro_im->estado_pre_cobro;
        if($estado==false){
            $cabeceras=DB::select("select * from pre_cobro_cabecera('".$id."')");
            $detalle_cabeceras=DB::select("select * from cobros_detalle('".$pre_cobro_im->pedido_id."')");
            $detalle=[];
            foreach ($detalle_cabeceras as $item) {
                $detalle_item=Detalle_pedido::find($item->id);
                $detalle[]=$detalle_item;
            }
            $subtotal=round($this->subtotal_cuenta($detalle),2);
            $servicio=round($this->servicio_cuenta($detalle),2);
            $total=round($this->total_cuenta($detalle,$servicio),2);
            $iva=round($this->iva($detalle,$subtotal),2);
            $view=\View::make('facturas.fac', compact('cabeceras','detalle_cabeceras','subtotal','servicio','iva','total'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper(array(0,0,200,100000));
            $pdf->loadHTML($view);
            return $pdf->stream('factura');
        }
        else if($estado==true){
            $cabeceras=DB::select("select * from pre_cobro_cabecera('".$id."')");
            $precobro_detalle=Pre_Cobro_Detalle::where('pre_cobro_id','=',$id)->get();
            $detalle_cabeceras=DB::select("select * from cobros_detalle_separados('".$id."')");
            $detalle_separado=[];
            foreach ($precobro_detalle as $item_producto) {
                $detalle_item_separdado=Detalle_pedido::find($item_producto->detalle_pedido_id);
                $detalle_separado[]=$detalle_item_separdado;
            }
            $subtotal=round($this->subtotal_cuenta($detalle_separado),2);
            $servicio=round($this->servicio_cuenta($detalle_separado),2);
            $total=round($this->total_cuenta($detalle_separado,$servicio),2);
            $iva=round($this->iva($detalle_separado,$subtotal),2);
            $view=\View::make('facturas.fac', compact('cabeceras','detalle_cabeceras','subtotal','servicio','iva','total'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper(array(0,0,200,100000));
            $pdf->loadHTML($view);
            return $pdf->stream('factura');
        }
    }

    public function create(Request $request){
        try{
            DB::beginTransaction();
            $personal=Auth::user();
            $precobro=Pre_Cobro::find($request->precobro_id);
            $cobro=new Cobro();
            $cobro->fecha_cobro=\Carbon\Carbon::today();
            $cobro->pedido_id=$precobro->pedido_id;
            $cobro->precobro_id=$request->precobro_id;
            $cobro->sucursal_id=$personal->personal->sucursal_id;
            $cobro->personal_id=$personal->personal->id;
            $cobro->save();
            $items=[];
            $detalle_efectivo=json_decode($request->efectivo);
            $detalle_tarjeta=json_decode($request->tarjeta);
            $detalle_cupones=json_decode($request->cupones);
            foreach ($detalle_efectivo as $item_efectivo) {
                $cobro_detalle=new Detalle_cobro();
                $cobro_detalle->tipo_cobro="Efectivo";
                $cobro_detalle->valor_cobro=$item_efectivo->valor;
                $cobro_detalle->sucursal_id=$personal->personal->sucursal_id;
                $cobro_detalle->fecha_cobro=\Carbon\Carbon::today();
                $items[]=$cobro_detalle;
            }

            foreach ($detalle_tarjeta as $item_tarjeta) {
                $cobro_detalle=new Detalle_cobro();
                $cobro_detalle->tipo_cobro="Tarjeta";
                $cobro_detalle->tipo_tarjeta_cobro=$item_tarjeta->tipo;
                $cobro_detalle->vaucher_cobro=$item_tarjeta->vaucher;
                $cobro_detalle->valor_cobro=$item_tarjeta->valor;
                $cobro_detalle->sucursal_id=$personal->personal->sucursal_id;
                $cobro_detalle->fecha_cobro=\Carbon\Carbon::today();
                $items[]=$cobro_detalle;
            }

            foreach ($detalle_cupones as $item_cupones) {
                $cobro_detalle=new Detalle_cobro();
                $cobro_detalle->tipo_cobro="Cupones";
                $cobro_detalle->valor_cobro=$item_cupones->valor;
                $cobro_detalle->sucursal_id=$personal->personal->sucursal_id;
                $cobro_detalle->fecha_cobro=\Carbon\Carbon::today();
                $items[]=$cobro_detalle;
            }
            $cobro->cobro()->saveMany($items);
            $precobro->estado_cobro=true;
            $precobro->save();
            $mesa=Mesa::find($precobro->pedido->mesa_id);
            $mesa->estado_mesa=false;
            $mesa->save();
            Flash::success('Guardado Exitosamente.');
            DB::commit();
            Session::forget('precobro_id');
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

    private function iva($cart,$subtotal){
        $valor_iva;
        $iva=0;
        foreach ($cart as $item) {
            $valor_iva=$item->producto->iva->iva;
        }
        $iva=$subtotal*($valor_iva/100);
        return $iva;
    }
}
