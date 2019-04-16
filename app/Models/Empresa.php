<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Empresa
 * @package App\Models
 * @version March 26, 2019, 11:01 am UTC
 *
 * @property string nombre_empresa
 */
class Empresa extends Model
{
    use SoftDeletes;

    public $table = 'empresas';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre_empresa','ruc_empresa','firma_digital_empresa','clave_empresa','img_empresa'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre_empresa' => 'string',
        'ruc_empresa'=> 'string',
        'firma_digital_empresa'=> 'string',
        'clave_empresa'=> 'string',
        'img_empresa'=> 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre_empresa' => 'required',
        'ruc_empresa'=> 'required',
        'firma_digital_empresa'=> 'required',
        'clave_empresa'=> 'required',
        'img_empresa'=> 'required'
    ];


}
