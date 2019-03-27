<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Personal
 * @package App\Models
 * @version March 26, 2019, 11:29 am UTC
 *
 * @property string ruc_personal
 * @property string nombre_personal
 * @property string telefono_personal
 * @property string email_personal
 * @property string img_personal
 * @property date nacimiento_personal
 * @property integer sucursal_id
 */
class Personal extends Model
{
    use SoftDeletes;

    public $table = 'personals';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'ruc_personal',
        'nombre_personal',
        'telefono_personal',
        'email_personal',
        'img_personal',
        'nacimiento_personal',
        'sucursal_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ruc_personal' => 'string',
        'nombre_personal' => 'string',
        'telefono_personal' => 'string',
        'email_personal' => 'string',
        'img_personal' => 'string',
        'nacimiento_personal' => 'date',
        'sucursal_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ruc_personal' => 'required',
        'nombre_personal' => 'required',
        'telefono_personal' => 'required',
        'email_personal' => 'email',
        'img_personal' => 'required',
        'nacimiento_personal' => 'date',
        'sucursal_id' => 'required'
    ];

    public function user()
    {
        return $this->hasMany('App\Models\Personal');
    }

    public function sucursal()
    {
        return $this->belongsTo('App\Models\Sucursal', 'sucursal_id', 'id');
    }
}
