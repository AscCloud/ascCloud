<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Mesa
 * @package App\Models
 * @version April 2, 2019, 9:56 am -05
 *
 * @property integer numero
 * @property integer planta_id
 */
class Mesa extends Model
{
    use SoftDeletes;

    public $table = 'mesas';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'numero_mesa',
        'planta_id',
        'sucursal_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'numero_mesa' => 'integer',
        'planta_id' => 'integer',
        'sucursal_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'numero_mesa' => 'required',
        'planta_id' => 'required',
        'sucursal_id' => 'required'
    ];

    public function planta()
    {
        return $this->belongsTo('App\Models\Planta', 'planta_id', 'id');
    }


}
