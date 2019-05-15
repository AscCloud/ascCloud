<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;

class ReporteController extends Controller
{
    public function ventas(){
        $productos=DB::select("select * from reporteventas('".\Carbon\Carbon::today()."')");
        return $productos;
    }

    public function cierre(){
        $cobros=DB::select("select * from cobros('".\Carbon\Carbon::today()."')");
        return view('cierre_caja.index')->with('cobros',$cobros);
    }
}
