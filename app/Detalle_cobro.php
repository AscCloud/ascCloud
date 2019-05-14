<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detalle_cobro extends Model
{
    //
    use SoftDeletes;
    public $table = 'detalle_cobros';

    protected $dates = ['deleted_at'];

    public function cobro()
    {
        return $this->belongsTo('App\Cobro', 'cobro_id','id');
    }
}
