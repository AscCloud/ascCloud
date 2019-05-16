<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cobro;
use App\Detalle_cobro;
use App\Pre_Cobro;
use App\Pedido;
use App\Models\Mesa;
use Illuminate\Support\Facades\Auth;
use View;
use Flash;
use Response;
use Session;
use Redirect;
use DB;
use PDF;

class CobroController extends Controller
{
    //
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
        $cobros=Cobro::where('sucursal_id','=',$personal->personal->sucursal_id)->get();
        return view('cobros.list')->with('cobros',$cobros);
    }

    public function showpdf($id){
        $cobros=Cobro::find($id);
        $estado=$cobros->precobro->estado_pre_cobro;
        if($estado==false){
            $cabeceras=DB::select("select * from cobros_cabecera('".$id."')");
            $detalle_cabeceras=DB::select("select * from cobros_detalle('".$cobros->id."')");
            $invoice = "2222";
            // return $cabecera['nombre_cliente'];
            $view=\View::make('facturas.index', compact('cabeceras','detalle_cabeceras','invoice'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);
            return $pdf->stream('invoice');
            // return $view;
        }else if($estado==true){
        }
        // $view = '<h1>hola</h1>';
        //
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
}
