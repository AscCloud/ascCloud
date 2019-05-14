<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cliente
 * @package App\Models
 * @version April 10, 2019, 3:15 pm -05
 *
 * @property strin ruc_cliente
 * @property string nombre_cliente
 * @property string telefono_cliente
 * @property string email_cliente
 * @property string nacimiento_cliente
 */
class Cliente extends Model
{
    use SoftDeletes;

    public $table = 'clientes';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'ruc_cliente',
        'nombre_cliente',
        'telefono_cliente',
        'email_cliente',
        'nacimiento_cliente'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre_cliente' => 'string',
        'telefono_cliente' => 'string',
        'email_cliente' => 'string',
        'nacimiento_cliente' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ruc_cliente' => 'required',
        'nombre_cliente' => 'required',
        'telefono_cliente' => 'required',
        'email_cliente' => 'email',
    ];


}
