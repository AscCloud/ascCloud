<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cobro;
use App\Detalle_cobro;
use App\Pre_Cobro;
use Illuminate\Support\Facades\Auth;
use View;
use Flash;
use Response;
use Session;
use Redirect;
use DB;

class CobroController extends Controller
{
    //
    public function index(){
        $personal=Auth::user();
        $cobros=Pre_Cobro::where('sucursal_id','=',$personal->personal->sucursal_id)->where('fecha_pre_cobro','=',\Carbon\Carbon::today())->get();
        return view('cobros.index')->with('cobros',$cobros);
    }

    public function showmoney($id){
        Session::put('precobro_id',$id);
        $precobro=Pre_Cobro::find($id);
        return $precobro->total_pre_cobro . " / ". $precobro->cliente->nombre_cliente;
    }



}
