<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sucursal
 * @package App\Models
 * @version March 26, 2019, 11:09 am UTC
 *
 * @property string nombre_sucursal
 * @property string direccion_sucursal
 * @property string telefono_sucursal
 * @property integer empresa_id
 */
class Sucursal extends Model
{
    use SoftDeletes;

    public $table = 'sucursals';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre_sucursal',
        'direccion_sucursal',
        'telefono_sucursal',
        'empresa_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre_sucursal' => 'string',
        'direccion_sucursal' => 'string',
        'telefono_sucursal' => 'string',
        'empresa_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre_sucursal' => 'required',
        'direccion_sucursal' => 'required',
        'telefono_sucursal' => 'required',
        'empresa_id' => 'required'
    ];

    
}
