<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cliente
 * @package App\Models
 * @version March 21, 2019, 1:23 am UTC
 *
 * @property string nombre_cliente
 * @property string apellido_cliente
 * @property string ruc_cliente
 * @property string telefono_cliente
 * @property string email_cliente
 * @property string direccion_cliente
 */
class Cliente extends Model
{
    use SoftDeletes;

    public $table = 'clientes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre_cliente',
        'apellido_cliente',
        'ruc_cliente',
        'telefono_cliente',
        'email_cliente',
        'direccion_cliente'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre_cliente' => 'string',
        'apellido_cliente' => 'string',
        'ruc_cliente' => 'string',
        'telefono_cliente' => 'string',
        'email_cliente' => 'string',
        'direccion_cliente' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre_cliente' => 'required',
        'apellido_cliente' => 'required',
        'ruc_cliente' => 'required',
        'telefono_cliente' => 'required',
        'email_cliente' => 'email',
        'direccion_cliente' => 'required'
    ];

    
}
