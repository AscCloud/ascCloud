<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReporteController extends Controller
{
    public function ventas(){
        $productos=DB::select("select * from reporteventas('".\Carbon\Carbon::today()."')");
        return $productos;
    }
}
