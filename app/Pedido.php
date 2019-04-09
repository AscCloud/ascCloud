<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    //
    use SoftDeletes;
    public $table = 'pedidos';

    protected $dates = ['deleted_at'];

    public function detalle(){
        return $this->hasMany('App\Pedido');
    }

    public function personal()
    {
        return $this->belongsTo('App\Models\Personal', 'personal_id','id');
    }

    public function mesa()
    {
        return $this->belongsTo('App\Models\Mesa', 'mesa_id','id');
    }
}
