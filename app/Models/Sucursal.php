<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sucursal
 * @package App\Models
 * @version March 21, 2019, 1:15 am UTC
 *
 * @property string nombre_sucursal
 * @property string direccion_sucursal
 * @property string telefono_sucursal
 */
class Sucursal extends Model
{
    use SoftDeletes;

    public $table = 'sucursals';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre_sucursal',
        'direccion_sucursal',
        'telefono_sucursal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre_sucursal' => 'string',
        'direccion_sucursal' => 'string',
        'telefono_sucursal' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre_sucursal' => 'required',
        'direccion_sucursal' => 'required',
        'telefono_sucursal' => 'required'
    ];

    
}
