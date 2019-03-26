<?php

namespace App\Repositories;

use App\Models\Personal;
use App\Repositories\BaseRepository;

/**
 * Class PersonalRepository
 * @package App\Repositories
 * @version March 26, 2019, 11:29 am UTC
*/

class PersonalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ruc_personal',
        'nombre_personal',
        'telefono_personal',
        'email_personal',
        'img_personal',
        'nacimiento_personal',
        'sucursal_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Personal::class;
    }
}
