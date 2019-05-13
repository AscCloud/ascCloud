<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detalle_pedido extends Model
{
    //
    use SoftDeletes;
    public $table = 'detalle_pedidos';

    protected $dates = ['deleted_at'];

    public function producto()
    {
        return $this->belongsTo('App\Models\Producto', 'producto_id','id');
    }

    public function pedido()
    {
        return $this->belongsTo('App\Pedido', 'pedido_id','id');
    }
}
