<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pre_Cobro_Detalle extends Model
{
    //
    use SoftDeletes;
    public $table = 'pre_cobro_detalles';

    protected $dates = ['deleted_at'];

    public function precobro()
    {
        return $this->belongsTo('App\Pre_Cobro', 'pre_cobro_id','id');
    }
}
