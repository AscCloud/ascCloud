<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cobro extends Model
{
    //
    use SoftDeletes;
    public $table = 'cobros';

    protected $dates = ['deleted_at'];

    public function precobro()
    {
        return $this->belongsTo('App\Pre_Cobro', 'precobro_id','id');
    }
}
