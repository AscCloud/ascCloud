<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Productos
 * @package App\Models
 * @version March 21, 2019, 2:38 am UTC
 *
 * @property string nombre_producto
 * @property float precio_producto
 * @property string img_producto
 * @property integer sucursal_id
 * @property integer categoria_id
 */
class Productos extends Model
{
    use SoftDeletes;

    public $table = 'productos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre_producto',
        'precio_producto',
        'img_producto',
        'sucursal_id',
        'categoria_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre_producto' => 'string',
        'precio_producto' => 'float',
        'img_producto' => 'string',
        'sucursal_id' => 'integer',
        'categoria_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre_producto' => 'required',
        'precio_producto' => 'required',
        'img_producto' => 'required',
        'sucursal_id' => 'required',
        'categoria_id' => 'required'
    ];

    
}
