<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pre_Cobro extends Model
{
    //
    use SoftDeletes;
    public $table = 'pre_cobros';

    protected $dates = ['deleted_at'];

    public function pre_cobro()
    {
        return $this->hasMany('App\Pre_Cobro','pre_cobro_id','id');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente', 'cliente_id','id');
    }

    public function pedido(){
        return $this->belongsTo('App\Pedido', 'pedido_id','id');
    }
}
