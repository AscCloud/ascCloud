<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Flash;
use Response;
use Session;
use Redirect;

class PreCobroController extends Controller
{
    //

    public function index($id){
        Session::put('pedido_id',$id);
        return view('pre_cobros.index');
    }

    public function cliente($ruc){
        $cliente=Cliente::where('ruc_cliente','=',$ruc)->get();
        return $cliente;
    }
}
