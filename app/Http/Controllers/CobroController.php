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
        $cobro=Pre_Cobro::where('sucursal_id','=',$personal->personal->sucursal_id)->get();
        return $cobro;
    }

}
