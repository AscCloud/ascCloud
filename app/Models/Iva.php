<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Iva
 * @package App\Models
 * @version March 26, 2019, 11:45 am UTC
 *
 * @property decimal iva
 */
class Iva extends Model
{
    use SoftDeletes;

    public $table = 'ivas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'iva'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'iva' => 'required'
    ];

    
}
