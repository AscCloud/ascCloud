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
}
