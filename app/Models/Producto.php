<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Producto
 * @package App\Models
 * @version March 26, 2019, 11:51 am UTC
 *
 * @property string nombre_producto
 * @property decimal precio_producto
 * @property string img_producto
 * @property integer iva_id
 * @property integer sucursal_id
 * @property integer categoria_id
 */
class Producto extends Model
{
    use SoftDeletes;

    public $table = 'productos';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre_producto',
        'precio_producto',
        'img_producto',
        'especificacion_producto',
        'iva_id',
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
        'img_producto' => 'string',
        'especificacion_producto' => 'string',
        'iva_id' => 'integer',
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
        'especificacion_producto' => 'required',
        'iva_id' => 'required',
        'sucursal_id' => 'required',
        'categoria_id' => 'required'
    ];

    public function sucursal()
    {
        return $this->belongsTo('App\Models\Sucursal', 'sucursal_id', 'id');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria', 'categoria_id', 'id');
    }

    public function iva()
    {
        return $this->belongsTo('App\Models\Iva', 'iva_id', 'id');
    }

}
