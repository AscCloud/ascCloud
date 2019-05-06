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
}
