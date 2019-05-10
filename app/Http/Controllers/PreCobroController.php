<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Flash;
use Response;
use Session;
use Redirect;
use DB;
class PreCobroController extends Controller
{
    //

    public function index($id){
        Session::put('pedido_id',$id);
        return view('pre_cobros.index');
    }

    public function indexseparado($id){
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
}
