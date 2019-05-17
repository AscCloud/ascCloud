<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use View;

class ReporteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cajero');
    }
    public function fechaventas(Request $request){
        $personal=Auth::user();
        if($request->fecha=="hoy"){
            $productos=DB::select("select * from reporteventas('".\Carbon\Carbon::today()."','".$personal->personal->sucursal_id."')");
            return $productos;
        }else{
            $productos=DB::select("select * from reporteventas('".$request->fecha."', '".$personal->personal->sucursal_id."')");
            return $productos;
        }
    }

    public function showventas(){
        return view('ventas.fecha_ventas');
    }

    public function ventas(){
        $personal=Auth::user();
        $productos=DB::select("select * from reporteventas('".\Carbon\Carbon::today()."', '".$personal->personal->sucursal_id."')");
        return view('ventas.index')->with('productos',$productos);
    }

    public function cierre(){
        $personal=Auth::user();
        $cobros=DB::select("select * from cobros('".\Carbon\Carbon::today()."', '".$personal->personal->sucursal_id."')");
        return view('cierre_caja.index')->with('cobros',$cobros);
    }

    public function showciere(){
        return view('cierre_caja.fecha_caja');
    }

    public function cierrefecha(Request $request){
        $personal=Auth::user();
        if($request->fecha=="hoy"){
            $cobros=DB::select("select * from cobros('".\Carbon\Carbon::today()."', '".$personal->personal->sucursal_id."')");
            return $cobros;
        }else{
            $cobros=DB::select("select * from cobros('".$request->fecha."', '".$personal->personal->sucursal_id."')");
            return $cobros;
        }
    }
}
