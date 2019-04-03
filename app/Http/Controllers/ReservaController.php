<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planta;
use App\Models\Mesa;
use Flash;
use Response;
use Session;
use Redirect;
class ReservaController extends Controller
{
    //
    public function index(){
        $plantas=Planta::all();
        $planta= new Planta();
        $planta->id=0;
        $planta->nombre_planta="---Selecione---";
        $plantas->push($planta);
        $plant=$plantas->sortBy('id')->pluck('nombre_planta','id');
        $mesas=Mesa::all();
        return view('reservas.index')->with('mesas', $mesas)->with('plant',$plant);
    }
    public function planta(Request $request){
        $mesas = Mesa::where('planta_id','=',$request->id)->get();
        if(empty($mesas)){
            return "-1";
        }
        return $mesas;
    }

    public function reserva($id){
        Session::put('idm',$id);
        return redirect('/pedido');
    }
}
