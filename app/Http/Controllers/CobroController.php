<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cobro;
use App\Detalle_cobro;
use View;
use Flash;
use Response;
use Session;
use Redirect;
use DB;

class CobroController extends Controller
{
    //

    public function createone(Request $request){
        $cobro=new Cobro();
    }

}
