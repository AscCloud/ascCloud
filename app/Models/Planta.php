<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Planta
 * @package App\Models
 * @version April 2, 2019, 9:54 am -05
 *
 * @property string nombre_planta
 * @property decimal descuento_planta
 * @property integer sucursal_id
 */
class Planta extends Model
{
    use SoftDeletes;

    public $table = 'plantas';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre_planta',
        'descuento_planta',
        'sucursal_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre_planta' => 'string',
        'sucursal_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre_planta' => 'required',
        'sucursal_id' => 'required'
    ];

    public function sucursal()
    {
        return $this->belongsTo('App\Models\Sucursal', 'sucursal_id', 'id');
    }


}
