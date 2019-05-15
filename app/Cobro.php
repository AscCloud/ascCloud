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

    public function cobro()
    {
        return $this->hasMany('App\Cobro','cobro_id','id');
    }

    public function precobro()
    {
        return $this->belongsTo('App\Pre_Cobro', 'precobro_id','id');
    }

    public function personal()
    {
        return $this->belongsTo('App\Models\Personal', 'personal_id','id');
    }
}
